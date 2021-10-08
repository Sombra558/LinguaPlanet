@extends('layouts.Administrador.Admin')

@section('content')
<cursos-edit  :planes="{{$planes}}"></cursos-create>
@endsection
