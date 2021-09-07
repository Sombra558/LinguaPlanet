@extends('layouts.Padres.padre')

@section('content')
    <edit-perfiluser :animals="{{$animals}}" :perfiluser="{{$perfil}}"></edit-perfiluser>
@endsection