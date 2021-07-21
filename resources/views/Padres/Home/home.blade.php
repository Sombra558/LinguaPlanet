@extends('layouts.Padres.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
        <h2 class="bold mt-4">Crea un perfil de estudiante</h2>
        </div>
    </div>
    <div class="row d-flex align-items-center">
            <div class="col-12 text-center">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <a href="/home/perfil-user/create">
                    <img src="{{ asset('/storage/images/add.svg') }}">
                </a>
            </div>
    </div>    
</div>
@endsection
