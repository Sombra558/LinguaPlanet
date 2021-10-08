@extends('layouts.Administrador.Admin')

@section('content')
  <cursos-component  :cursos="{{$cursos}}"></cursos-component>
@endsection
