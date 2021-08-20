@extends('layouts.Estudiante.estudiante')

@section('content')
    <show-perfiluser :perfil="{{$perfil}}"></show-perfiluser>
@endsection
