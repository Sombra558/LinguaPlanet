@extends('layouts.public')

@section('content')
  <div class="container mb-5">
    <proccess></proccess>
    <div class="row justify-content-center py-3">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card-rounded gray-back">
          <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-between">
              <span class="color-gray">Plan seleccionado</span>
              <span class="d-block color-plomo">Total</span>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12 d-flex py-2">
              <div class="col-6 d-flex align-items-center px-0">
                <img class="flag-img" src="{{ $plan->membresia->idioma->src }}">
                <span class="h3 mb-0 bold ml-2">{{ $plan->membresia->idioma->idioma }}</span>
              </div>
              <div class="col-6 d-flex align-items-center justify-content-end px-0">
                <precio :plan="{{$plan}}"></precio>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-12">
              <span class="color-plomo">Pago mensual automatico</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-4 text-center color-yellow">
      <div class="col-12">
        <span data-toggle="modal" data-target="#exampleModal" class="h5">¿Tienes un cupon de descuento?</span>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card-rounded gray-back p-3">
          <div class="form-group" id="toggler">
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
        </div>
      </div>
    </div>          
    <div class="row my-4">
      <div class="col-12 text-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 11H5C3.89543 11 3 11.8954 3 13V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V13C21 11.8954 20.1046 11 19 11Z" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M7 11V7C7 5.67392 7.52678 4.40215 8.46447 3.46447C9.40215 2.52678 10.6739 2 12 2C13.3261 2 14.5979 2.52678 15.5355 3.46447C16.4732 4.40215 17 5.67392 17 7V11" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="h5 align-middle">Tu pago es 100% seguro.</span>
      </div>
    </div>
    <modalcupon :plan="{{$plan}}"></modalcupon>
  </div>
@endsection