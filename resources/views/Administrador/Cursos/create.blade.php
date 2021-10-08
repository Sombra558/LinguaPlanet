@extends('layouts.Administrador.Admin')

@section('content')
  <cursos-create  :membresias="{{$membresias}}"></cursos-create>
@endsection
