@extends('layouts.public')

@section('content')
<div class="container mb-5">
	<proccess accion="completado"></proccess>
	<div class="row justify-content-center">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="card-rounded gray-back text-center py-5">
				<img class="my-3" src="/images/check-circle.svg">
				<span class="h3 d-block text-success">Pago completado</span>
		        <p class="color-plomo">
		        	Gracias, tu pago fue procesado correctamente. Hemos enviado el comprobante a
	        		<span class="text-success">valeria@example.com</span>
	        	</p>
	        	<div class="my-4">
	        		<span class="h6 d-block color-plomo">Codigo de corfirmación</span>
		        	<span class="h4 color-plomo">{{$transactionId}}</span>
	        	</div>
	        	<a class="btn btn-success w-25" href="/home">Continuar</a>
			</div>          	
		</div>		
	</div>
</div>
@endsection