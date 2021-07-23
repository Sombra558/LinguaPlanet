@extends('layouts.Estudiante.estudiante')

@section('content')
    <lista-cursos :cursos="{{$cursos}}" :idioma="{{$idioma}}" :perfil="{{$perfil}}"></lista-cursos>
@endsection
