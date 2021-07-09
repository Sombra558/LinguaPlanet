@extends('layouts.public')

@section('content')
<h2>Explora  y aprende del mundo con Lingua Planet  </h2>

        @foreach($idiomas as $idioma)   
                <a href="/cursos/{{$idioma->nombreURL}}">{{$idioma->idioma}}</a>
        @endforeach

@endsection
