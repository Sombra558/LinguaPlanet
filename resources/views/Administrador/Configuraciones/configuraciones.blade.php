@extends('layouts.Administrador.Admin')

@section('content')
<configuraciones-component :membresias="{{$membresias}}"></configuraciones-component>
@endsection
