@extends('layouts.Padres.padre')

@section('content')
	<pagos-padre-component :user="{{$user}}"></pagos-padre-component>
@endsection