@extends('layouts.publicdetalle')

@section('content')
<div class="container text-center">
	<h1 class="courses-title"><span class="courses-span">Explora  y aprende del mundo</span> con Lingua Planet</h1>
    <cursos-component idiomas="{{$idiomas}}" ></cursos-component>
    @foreach($idiomas as $idioma)   
            <a style="color : white;" href="{{ route('courses.show', $idioma->nombreURL) }}">{{$idioma->idioma}}</a>
    @endforeach
</div>
@endsection
