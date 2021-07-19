@extends('layouts.public')

@section('content')
	<div class="container mb-5">
		<div class="row">
			<membresia-show-component :idiomas="{{$idiomas}}" :membresia="{{$membresia}}"></membresia-show-component>
		</div>
	</div>
@endsection
