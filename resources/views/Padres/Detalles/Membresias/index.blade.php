@extends('layouts.Padres.padre')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <pagos-padre-component :user="{{$user}}"></pagos-padre-component>
        </div>
    </div>
</div>
@endsection