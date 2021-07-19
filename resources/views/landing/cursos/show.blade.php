@extends('layouts.publicdetalle')

@section('content')
	<div class="container mb-5">
		<div class="row">
			<curso-show-component :idiomas="{{$idiomas}}" :idioma="{{$idioma}}"></curso-show-component>	
		</div>		
	</div>
@endsection
