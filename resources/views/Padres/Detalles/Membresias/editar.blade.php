@extends('layouts.Padres.padre')

@section('content')
	<membresia-editar-component :plan="{{ $plan }}"></membresia-editar-component>
@endsection