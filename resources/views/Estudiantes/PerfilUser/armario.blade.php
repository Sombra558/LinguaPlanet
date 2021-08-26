@extends('layouts.Estudiante.estudiante')

@section('content')
    <armario-perfiluser :perfil="{{$perfil}}"></armario-perfiluser>
@endsection