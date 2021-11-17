@extends('layouts.Administrador.Admin')

@section('content')
<cursos-edit  :idiomas="{{$idiomas}}"  :membresias="{{$membresias}}" :curso="{{$curso}}"></cursos-create>
@endsection
