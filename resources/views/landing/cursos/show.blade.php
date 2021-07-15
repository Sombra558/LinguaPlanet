@extends('layouts.publicdetalle')

@section('content')
    <curso-show-component :idiomas="{{$idiomas}}" :idioma="{{$idioma}}"></curso-show-component>

@endsection
