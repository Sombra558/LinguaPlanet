@extends('layouts.Administrador.Admin')

@section('content')
    <reportes-ventas :ventas="{{$ventas}}" :membresias="{{$membresias}}"></reportes-ventas>
@endsection
