<form  action="{{ route('paypal-payment') }}" class=" d-flex flex-column mx-2" id="paypal" method="POST" enctype="multipart/form-data">
	@csrf
	<articulos :plan="{{$plan}}"></articulos>   
	<input type="submit" class="btn btn-block btn-success py-2 my-2" value="Completar pago con paypal">
	<span class="h6 color-plomo text-center my-3 mx-auto">
		Estas muy cerca de aprender y mejorar la educación de tu niño
	</span>
</form>
