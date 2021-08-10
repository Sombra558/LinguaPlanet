@extends('layouts.Padres.padre')

@section('content')
  <cursos-progreso-component :user="{{$user}}"></cursos-progreso-component>
@endsection