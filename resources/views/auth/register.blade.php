@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 register-title d-flex justify-content-center align-items-center">
            <h1 class="w-50">Aprende a través del juego</h1>
        </div>
        <div class="col-md-6 py-5 gray-back">
            <h2 class="bold mb-4 text-center">{{ __('Create a new account') }}</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
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
                                        id="name"
                                        type="text"
                                        class="form-input @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        autocomplete="name"
                                        placeholder="{{ __('Name') }}"
                                        autofocus
                                    >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
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
                                        id="lastname"
                                        type="text"
                                        class="form-input @error('lastname') is-invalid @enderror"
                                        name="lastname"
                                        value="{{ old('lastname') }}"
                                        required
                                        autocomplete="name"
                                        placeholder="{{ __('Last Name') }}"
                                        autofocus
                                    >
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
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
                                        placeholder="{{ __('Email') }}"
                                        autocomplete="email"
                                    >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="input-primary d-flex flex-row align-items-center">
                                    <div class="input-group-prepend pl-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.499 8.25H4.49902C4.08481 8.25 3.74902 8.58579 3.74902 9V19.5C3.74902 19.9142 4.08481 20.25 4.49902 20.25H19.499C19.9132 20.25 20.249 19.9142 20.249 19.5V9C20.249 8.58579 19.9132 8.25 19.499 8.25Z" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.62402 8.25V4.875C8.62402 3.97989 8.9796 3.12145 9.61254 2.48851C10.2455 1.85558 11.1039 1.5 11.999 1.5C12.8941 1.5 13.7526 1.85558 14.3855 2.48851C15.0184 3.12145 15.374 3.97989 15.374 4.875" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-input @error('password') is-invalid @enderror"
                                        name="password"
                                        required
                                        placeholder="{{ __('Password') }}"
                                        autocomplete="new-password"
                                    >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="input-primary d-flex flex-row align-items-center">
                                    <div class="input-group-prepend pl-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.499 8.25H4.49902C4.08481 8.25 3.74902 8.58579 3.74902 9V19.5C3.74902 19.9142 4.08481 20.25 4.49902 20.25H19.499C19.9132 20.25 20.249 19.9142 20.249 19.5V9C20.249 8.58579 19.9132 8.25 19.499 8.25Z" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.62402 8.25V4.875C8.62402 3.97989 8.9796 3.12145 9.61254 2.48851C10.2455 1.85558 11.1039 1.5 11.999 1.5C12.8941 1.5 13.7526 1.85558 14.3855 2.48851C15.0184 3.12145 15.374 3.97989 15.374 4.875" stroke="#31348B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <input
                                        id="password-confirm"
                                        type="password"
                                        class="form-input"
                                        name="password_confirmation"
                                        required
                                        placeholder="{{ __('Confirm your password') }}"
                                        autocomplete="new-password"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label or="terms"> 
                                    <input type="checkbox" id="terms" name="terms" value="true" required>
                                    {{ __('I Accept the terms and service policies') }}
                                </label>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-primary-red">
                                    {{ __('Create Account') }}
                                </button>
                            </div>
                        </div>
                        @unless( request()->routeIs('register') )
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <p class="my-0">¿Aún no tienes una cuenta?</p>
                                        <a href="{{ route('register') }}"><strong><u>Crea una aquí</u></strong></a>
                                    </div>
                                </div>
                            </div>
                        @endunless
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
