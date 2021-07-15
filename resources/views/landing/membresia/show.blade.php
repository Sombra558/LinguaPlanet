@extends('layouts.comprar')

@section('content')
    <membresia-show-component :idiomas="{{$idiomas}}" :membresia="{{$membresia}}"></membresia-show-component>

@endsection
