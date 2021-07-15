<form  class="mx-2" id="paypal" method="POST" enctype="multipart/form-data">
                   @csrf
               
                    <input class="form-control input-novedades mb-3" style="border-radius:8px;" type="text" name="direccion" placeholder="direccion" require>
                    <input type="hidden" name="currency" value="usd">
           
                  
                    
</form>
<small>You will be redirected to the PayPal checkout page</small>