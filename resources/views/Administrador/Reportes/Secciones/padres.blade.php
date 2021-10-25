@extends('layouts.Administrador.Admin')

@section('content')
    <reportes-padre :usuarios="{{$usuarios}}"></reportes-padre>
@endsection
