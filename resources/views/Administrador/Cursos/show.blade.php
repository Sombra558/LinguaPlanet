@extends('layouts.Administrador.Admin')

@section('content')
<cursos-show :siluetas="{{$siluetas}}" :curso="{{$curso}}" :membresias="{{$membresias}}"></cursos-show>
@endsection
