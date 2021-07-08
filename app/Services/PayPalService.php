<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Curso\Curso;
use Illuminate\Support\Facades\Storage;
use App\Helpers\General\CollectionHelper;
use Illuminate\Support\Facades\Auth;
use App\Services\PayPalService;
use App\Traits\ConsumesExternalServices;
use App\Models\Solicitudes\SolicitudArticuloCompra;
use App\Models\Solicitudes\SolicitudPedido;
use App\Models\Solicitudes\SolicitudArticuloCompraCuotas;
use App\Models\Solicitudes\SolicitudPedidoUser;
use App\Events\CompraArticulo;
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

        session()->put('approvalId', $order->id);
        session()->put('articulos', $request->articulos);
        session()->put('direccion', $request->direccion);
      
        return redirect($approve->href);
    }

    public function handleApproval()
    {
        
        if (session()->has('approvalId')) {
            $approvalId = session()->get('approvalId');
            $payment = $this->capturePayment($approvalId);
            $name = $payment->payer->name->given_name;
            $transactionId=$payment->purchase_units[0]->payments->captures[0]->id;
            $payment = $payment->purchase_units[0]->payments->captures[0]->amount;
            $amount = $payment->value;
            $currency = $payment->currency_code;
            
            $solicitud = SolicitudPedido::create([
                'estado' => 'verificado',
                'direccion' => session()->get('direccion'),
                'articulos' =>session()->get('articulos'),
                'cnumero' => $transactionId,
                'user_id' => Auth::user()->id,
                'fecha_de_solicitud' => Carbon::now()->subDay()->toDateString(),
                'precio_con_descuento' => $amount,
                'precion_sin_descuento' => $amount,
                'tipo' => "Paypal",
            ]);
            $pedidos = collect();
            $cursos = collect();
            $articulos = json_decode(session()->get('articulos'));
            foreach ($articulos as $articulo) {
                if ($articulo->tipo==='curso') {
                    $cursos->push($articulo);
                }else{
                    $pedidos->push($articulo);
                }
            }
            foreach ($cursos as $curso) {
                $cursoori=Curso::find($curso->horariosdis[0]->curso_id);
                if ($curso->tipopago==='cuotas') {
              
                    $sole=SolicitudArticuloCompra::create([
                        'user_id' => $solicitud->user_id,
                        'curso_id' =>  $cursoori->id,
                        'precio_con_descuento' => $curso->admision,
                        'precion_sin_descuento' => $curso->precio,
                        'fecha_de_solicitud' => Carbon::now()->subDay()->toDateString(),
                        'articulo_type' => 'Curso',
                        'comprobante' => $solicitud->cnumero,
                        'tipo' => 'cuotas',
                        'estado' => "verificado",
        
                    ]);
                 
                    event(new CompraArticulo($curso,$solicitud->user_id,$curso->precio,1));
                }else{
                   
                    $sole=SolicitudArticuloCompra::create([
                        'user_id' => $solicitud->user_id,
                        'curso_id' =>  $cursoori->id,
                        'precio_con_descuento' => $curso->precio,
                        'precion_sin_descuento' => $curso->precio,
                        'fecha_de_solicitud' => Carbon::now()->subDay()->toDateString(),
                        'articulo_type' => 'Curso',
                        'comprobante' => $solicitud->cnumero,
                        'tipo' => 'contado',
                        'estado' => "verificado",
        
                    ]);
                    event(new CompraArticulo($curso,$solicitud->user_id,$curso->precio,0));
                }
            }
            if ($pedidos->count()>0) {
                SolicitudPedidoUser::create([
                    'solicitud_pedido_id' => $solicitud->id,
                    'articulos'=>json_encode($pedidos),
                    'codigo' => str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT),
                ]);
              
            }
            
            
    
            return redirect()
                ->route('home')
                ->withSuccess(['payment' => "Thanks, {$name}. We received your {$amount}{$currency} payment."]);
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