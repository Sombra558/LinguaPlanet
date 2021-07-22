@extends('layouts.Padres.padre')

@section('content')
    <home-component :user="{{$user}}" ></home-component>
@endsection
