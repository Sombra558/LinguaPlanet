<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cursos\Cupon;
use App\Models\Membresia\Membresia;
use App\Models\Membresia\Plan;

use App\Services\PayPalService;
class PaypalController extends Controller
{
    public function pay(Request $request)
    {
        $rules = [
            'value' => ['required', 'numeric', 'min:5'],
            'currency' => ['required'],
        ];
        $request->validate($rules);
        $paymentPlatform = resolve(PayPalService::class);
        return $paymentPlatform->handlePayment($request);
    }
    public function approval()
    {
        $paymentPlatform = resolve(PayPalService::class);

        return $paymentPlatform->handleApproval();
    }
    public function cancelled()
    {
        return redirect()
            ->route('home')
            ->withErrors('You cancelled the payment');
    }

    public function cupon($cupon,$plan,$membresia)
    {
        $cuponapli=Cupon::where('codigo',$cupon)->first()->load('membresias');
        if($cuponapli) {
            if ($cuponapli->tipo_cupon==='Global' && $cuponapli->cantidad!=0) {
                return $cuponapli;
            }else{
                $tempmembresia=Membresia::find($membresia);
                foreach ($cuponapli->membresias as $membresia) {
                    if ($membresia->id===$tempmembresia->id) {
                            return $cuponapli;
                    }
                }
                
            }
        }else{
            return null;
        }
    }
}