@extends('layouts.Estudiante.estudiante')

@section('content')
	<show-curso :curso="{{$curso}}" :idioma="{{$idioma}}" :perfil="{{$perfil}}"></show-curso>
@endsection