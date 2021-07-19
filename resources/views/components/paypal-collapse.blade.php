<form  class="mx-2" id="paypal" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="currency" value="usd">
	<input type="hidden" name="plan_id" value="{{$plan->id}}">
	<input type="hidden" name="value" value="{{$plan->precio}}">         
</form>
<small>You will be redirected to the PayPal checkout page</small>