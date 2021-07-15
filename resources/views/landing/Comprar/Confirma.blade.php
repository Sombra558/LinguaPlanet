@extends('layouts.comprar')

@section('content')
<div class="container mb-5">
           <br><br><br><br>
           <h2 class="pl-4" style="font-family: 'TitilliumWeb-SemiBold';">Verificacion de Pedido</h2>
           <div class="row m-0 justify-content-between">
                        <div class="col-sm-12 col-md-5" class="form-group" id="toggler">
                                <div id="efectivoCollapse" class="collapse" data-parent="#toggler" >
                                        @includeIf('components.efectivo-collapse')
                                </div>
                                <div id="transferenciabancariaCollapse" class="collapse" data-parent="#toggler">
                                        @includeIf('components.transferencia-collapse')
                                </div>
                                <div id="paypalCollapse"  class="collapse" data-parent="#toggler">
                                        @includeIf('components.paypal-collapse')
                                </div>

                                <payment-collase class="w-100"></payment-collase>
                        </div>
                                  
                                  
                                   
                                  
                        <div class="col-sm-12 col-md-5">
                      
                        
                        </div>
             
           </div>
          
</div>
@endsection