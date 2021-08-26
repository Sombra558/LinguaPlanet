@extends('layouts.publicdetalle')

@section('content')
	@unless(!request()->routeIs('courses.index'))
        @include('layouts.Padres.background-stars')
    @endunless
    <cursos-component :idiomas="{{ $idiomas }}" ></cursos-component>
@endsection
