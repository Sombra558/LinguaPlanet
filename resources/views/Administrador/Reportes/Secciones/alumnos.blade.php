@extends('layouts.Administrador.Admin')

@section('content')
    <reportes-alumnos :cursos="{{$cursos}}" :perfiles="{{$perfiles}}"></reportes-alumnos>
@endsection
