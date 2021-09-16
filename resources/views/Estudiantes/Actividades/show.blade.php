@extends('layouts.Estudiante.actividades')

@section('content')
	<show-actividad :perfil="{{$perfil}}" :curso="{{$curso}}" :actividad="{{$actividad}}" ></show-actividad>
@endsection