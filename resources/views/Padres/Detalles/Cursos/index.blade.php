@extends('layouts.Padres.padre')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <cursos-padre-component :user="{{$user}}"></cursos-padre-component>
    </div>
</div>
@endsection