@extends('layouts.Administrador.Admin')

@section('content')
<membresias-component :membresias="{{$membresias}}" :idiomas="{{$idiomas}}"></membresias-component>
@endsection
