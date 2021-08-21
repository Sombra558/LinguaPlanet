@extends('layouts.Estudiante.home')

@section('content')
    <preview-perfiluser :perfil="{{$perfil}}"></preview-perfiluser>
@endsection
