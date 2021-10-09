@extends('layouts.Administrador.Admin')

@section('content')
 <cupones-show :cupon="{{$cupon}}" :membresias="{{$membresias}}"></cupones-show>
@endsection
