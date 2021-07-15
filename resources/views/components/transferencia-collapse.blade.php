<form  action="{{ route('paypal-payment') }}" class="mx-2" id="paypal" method="POST" enctype="multipart/form-data">
                   @csrf
                    <input type="hidden" name="currency" value="usd">
                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                    <input type="hidden" name="value" value="{{$plan->precio}}">
                    <input type="submit" value="Completar pago con paypal">
                    <small>Estas muy cerca de aprender mejorar la educación de tu niño </small>
                  
                    
</form>
