@extends('layouts.Padres.padre')

@section('content')
  <certificados-perfiles-component :user="{{$user}}"></certificados-perfiles-component>
@endsection