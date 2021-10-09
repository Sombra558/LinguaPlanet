@extends('layouts.Administrador.Admin')

@section('content')
 <cupones-component :cupones="{{$cupones}}"></cupones-component>
@endsection
