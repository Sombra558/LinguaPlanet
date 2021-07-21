@extends('layouts.Padres.padre')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <perfil-padre-component :user="{{$user}}"></perfil-padre-component>
        </div>
    </div>
</div>
@endsection
