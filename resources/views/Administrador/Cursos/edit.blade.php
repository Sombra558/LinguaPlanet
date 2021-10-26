@extends('layouts.Administrador.Admin')

@section('content')
<cursos-edit   :membresias="{{$membresias}}" :curso="{{$curso}}"></cursos-create>
@endsection
