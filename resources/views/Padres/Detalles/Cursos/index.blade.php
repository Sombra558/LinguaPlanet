@extends('layouts.Padres.padre')

@section('content')
  <cursos-padre-component :user="{{$user}}"></cursos-padre-component>
@endsection