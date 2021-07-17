@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="mb-4">{{ __('Create a new password') }}</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
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
                                value="{{ $email ?? old('email') }}"
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
                <div class="form-group row mt-4">
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
                <div class="form-group row mt-4">
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
                                placeholder="{{ __('Confirm Password') }}"
                                autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-center mb-0">
                    <div class="col-md-8">
                        <button type="submit" class="btn mt-3 btn-block btn-primary-red">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
