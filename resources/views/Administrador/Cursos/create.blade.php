@extends('layouts.Administrador.Admin')

@section('content')
  <cursos-create :idiomas="{{$idiomas}}"  :membresias="{{$membresias}}"></cursos-create>
@endsection
