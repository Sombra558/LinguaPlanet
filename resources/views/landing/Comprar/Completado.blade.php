@extends('layouts.comprar')

@section('content')
<div class="container mb-5">
           <br><br><br><br>
           <proccess accion="completado"></proccess>
            <div>
                <h3>Pago completado</h3>
                <p>Gracias, tu pago fue procesado correctamente. Hemos enviado el comprobante a valeria@example.com</p>

                <strong>Codigo de corfirmación</strong>
                {{$transactionId}}
            </div>
          
</div>
@endsection