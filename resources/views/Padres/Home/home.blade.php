@extends('layouts.Padres.padre')

@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="row">
        <div class="col-12 text-center">
        <h3 class="bold mt-4">Crea un perfil de estudiante</h3>
        </div>
    </div>
    <div class="row d-flex align-items-center pt-5">
            <div class="col-12 text-center mt-5">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="/home/perfil-user/create">
                    <img class="iz-10" src="{{ asset('/storage/images/add.svg') }}">
                </a>
            </div>
    </div>    
=======
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <home-component :user="{{$user}}" ></home-component>
                  
                </div>
            </div>
        </div>
    </div>
>>>>>>> master
</div>
@endsection
