@extends('layouts.Estudiante.estudiante')

@section('content')
	<show-actividad :perfil="{{$perfil}}" :actividad="{{$actividad}}" ></show-actividad>
@endsection