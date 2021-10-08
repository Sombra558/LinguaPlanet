@extends('layouts.Administrador.Admin')

@section('content')
  <home-component :usuarios="{{$usuarios}}" :cursos="{{$cursosActivos}}" :perfiles="{{$perfiles}}"></home-component>
@endsection
