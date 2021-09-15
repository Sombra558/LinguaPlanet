@extends('layouts.Padres.padre')

@section('content')
  <cursos-individual-component :perfil="{{$perfil}}"></cursos-individual-component>
@endsection