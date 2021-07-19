@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex flex-column justify-content-center text-center">
            @if(session('status'))
                <img class="send-link-success mx-auto" src="{{ asset('storage/images/send-link-success.svg') }}" alt="Enlace de recuperacion enviado">
                <h2 class="mb-4">{{ __('We have sended the recovery email successfully') }}</h2>
                <a href="#" class="btn btn-primary-red w-50 mx-auto">Continuar</a>
            @else
                <h1 class="mb-4">{{ __('Recovery Password') }}</h1>
                <h2>{{ __('Type your email, well send you a recovery link') }}</h2>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group row mt-4">
                                <div class="col-12">
                                    <div class="input-primary d-flex flex-row align-items-center">
                                        <div class="input-group-prepend pl-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 5.25L12 13.5L3 5.25" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M3 5.25H21V18C21 18.1989 20.921 18.3897 20.7803 18.5303C20.6397 18.671 20.4489 18.75 20.25 18.75H3.75C3.55109 18.75 3.36032 18.671 3.21967 18.5303C3.07902 18.3897 3 18.1989 3 18V5.25Z" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.3638 12L3.23145 18.538" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M20.7692 18.5381L13.6367 12" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <input
                                            id="email"
                                            type="email"
                                            class="form-input @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                            placeholder="{{ __('Email') }}"
                                            autofocus
                                        >
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    {{-- <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="form-group row mb-0 d-flex justify-content-center">
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary-red btn-block">
                                {{ __('Send Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
