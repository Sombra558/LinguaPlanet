@extends('layouts.Administrador.Admin')

@section('content')
<usuarios-component :membresias="{{$membresias}}" :usuarios="{{$usuarios}}" :inscripciones="{{$inscripciones}}"></usuarios-component>
@endsection
