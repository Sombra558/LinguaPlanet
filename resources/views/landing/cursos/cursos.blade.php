@extends('layouts.publicdetalle')

@section('content')
    <cursos-component :idiomas="{{ $idiomas }}" ></cursos-component>
@endsection
