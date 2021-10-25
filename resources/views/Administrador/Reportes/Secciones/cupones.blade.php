@extends('layouts.Administrador.Admin')

@section('content')
    <reportes-cupones :cupones="{{$cupones}}" :membresias="{{$membresias}}"></reportes-cupones>
@endsection
