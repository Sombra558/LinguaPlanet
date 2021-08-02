@extends('layouts.Padres.padre')

@section('content')
	<perfil-padre-component :user="{{$user}}"></perfil-padre-component>
@endsection
