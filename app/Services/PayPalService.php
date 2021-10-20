<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Curso\Curso;
use App\Models\Cursos\Cupon;
use App\Models\Cursos\CuponHistory;
use Illuminate\Support\Facades\Storage;
use App\Helpers\General\CollectionHelper;
use Illuminate\Support\Facades\Auth;
use App\Services\PayPalService;
use App\Traits\ConsumesExternalServices;
use App\Models\Solicitudes\PlanUser;
use App\Models\Idioma\Idioma;
use App\Models\Membresia\Plan;
use Carbon\Carbon;

class PayPalService
{
    use ConsumesExternalServices;

    protected $baseUri;

    protected $clientId;

    protected $clientSecret;

    protected $plans;

    public function __construct()
    {
        $this->baseUri = config('services.paypal.base_uri');
        $this->clientId = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');
        $this->plans = config('services.paypal.plans');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");

        return "Basic {$credentials}";
    }

    public function handlePayment(Request $request)
    {
        $order = $this->createOrder($request->value, $request->currency);
    
        $orderLinks = collect($order->links);

        $approve = $orderLinks->where('rel', 'approve')->first();
        if ($request->cupon_id) {
            session()->put('cupon_id', $request->cupon_id);
        }

        session()->put('approvalId', $order->id);
        session()->put('plan_id', $request->plan_id);
        return redirect($approve->href);
    }

    public function handleApproval()
    {
        
        if (session()->has('approvalId')) {
            $approvalId = session()->get('approvalId');
            $plan_id = session()->get('plan_id');
            $cupon_id = session()->get('cupon_id');
            $payment = $this->capturePayment($approvalId);
            $name = $payment->payer->name->given_name;
            $transactionId=$payment->purchase_units[0]->payments->captures[0]->id;
            $payment = $payment->purchase_units[0]->payments->captures[0]->amount;
            $amount = $payment->value;
            $currency = $payment->currency_code;
            $plan =Plan::find($plan_id);
            if ($cupon_id) {
                $cupon=Cupon::find($cupon_id);
                $cupon->cantidad=$cupon->cantidad-1;
                $cupon->save();
                $cuponHistory = CuponHistory::create([
                    'precio_pago' => $payment->value,
                    'plan_id' => $plan_id,
                    'cupon_id' => $cupon_id,
                ]);
            }
            $solicitud = PlanUser::create([
                'comprobante' => $transactionId,
                'plan_id' => $plan_id,
                'available' => $plan->stock,
                'user_id' => Auth::user()->id,
                'tipo' => "Paypal",
            ]);
                       
            $idiomas=Idioma::get();
            return view('landing.Comprar.Completado', compact('transactionId','idiomas'));
        }

        return redirect()
            ->route('mygrid')
            ->withErrors('We cannot capture your payment. Try again, please');
    }
    public function handleSubscription(Request $request)
    {
        $subscription = $this->createSubscription(
            $request->plan,
            $request->user()->name,
            $request->user()->email
        );

        $subscriptionLinks = collect($subscription->links);

        $approve = $subscriptionLinks->where('rel', 'approve')->first();

        session()->put('subscriptionId', $subscription->id);

        return redirect($approve->href);
    }

    public function validateSubscription(Request $request)
    {
        if (session()->has('subscriptionId')) {
            $subscriptionId = session()->get('subscriptionId');

            session()->forget('subscriptionId');

            return $request->subscription_id == $subscriptionId;
        }

        return false;
    }

    public function createOrder($value, $currency)
    {
        return $this->makeRequest(
            'POST',
            '/v2/checkout/orders',
            [],
            [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => strtoupper($currency),
                            'value' => round($value * $factor = $this->resolveFactor($currency)) / $factor,
                        ]
                    ]
                ],
                'application_context' => [
                    'brand_name' => config('app.name'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'PAY_NOW',
                    'return_url' => route('approval'),
                    'cancel_url' => route('cancelled'),
                ]
            ],
            [],
            $isJsonRequest = true,
        );
    }

    public function capturePayment($approvalId)
    {
        return $this->makeRequest(
            'POST',
            "/v2/checkout/orders/{$approvalId}/capture",
            [],
            [],
            [
                'Content-Type' => 'application/json',
            ],
        );
    }

    public function createSubscription($planSlug, $name, $email)
    {
        return $this->makeRequest(
            'POST',
            '/v1/billing/subscriptions',
            [],
            [
                'plan_id' => $this->plans[$planSlug],
                'subscriber' => [
                    'name' => [
                        'given_name' => $name,
                    ],
                    'email_address' => $email,
                ],
                'application_context' => [
                    'brand_name' => config('app.name'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'SUBSCRIBE_NOW',
                    'return_url' => route('subscribe.approval', ['plan' => $planSlug]),
                    'cancel_url' => route('subscribe.cancelled'),
                ]
            ],
            [],
            $isJsonRequest = true,
        );
    }

    public function resolveFactor($currency)
    {
        $zeroDecimalCurrencies = ['JPY'];

        if (in_array(strtoupper($currency), $zeroDecimalCurrencies)) {
            return 1;
        }

        return 100;
    }
}