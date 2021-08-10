@extends('layouts.Padres.padre')

@section('content')
  <cursos-individual-component :user="{{$user}}"></cursos-individual-component>
@endsection