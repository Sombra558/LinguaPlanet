@extends('layouts.Administrador.Admin')

@section('content')
<cursos-show :curso="{{$curso}}" :membresias="{{$membresias}}"></cursos-show>
@endsection
