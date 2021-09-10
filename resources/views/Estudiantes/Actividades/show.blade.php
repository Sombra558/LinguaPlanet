@extends('layouts.Estudiante.actividades')

@section('content')
	<show-actividad :perfil="{{$perfil}}" :actividad="{{$actividad}}" ></show-actividad>
@endsection