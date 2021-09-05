@extends('layouts.Estudiante.estudiante')

@section('content')
	<show-curso :curso="{{$curso}}" :idioma="{{$idioma}}" :perfil="{{$perfil}}" :contenidos="{{$contenidos}}"></show-curso>
@endsection