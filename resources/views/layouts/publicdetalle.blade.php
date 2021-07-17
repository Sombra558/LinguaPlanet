<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body @if(request()->routeIs('courses.index')) style="background-color: #31348B;" @endif>
    <div class="d-flex h-screen flex-column justify-content-between">
        
        @include('layouts.navbar')

        <div id="app">
            <main class="py-4">
                @yield('content')                
            </main>
        </div>
        <footer class="courses-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-2 d-flex justify-content-center p-0">
                        <img class="send-link-success" src="{{ asset('storage/images/white-logo.svg') }}" alt="Enlace de recuperacion enviado">
                    </div>                
                    <div class="col-sm-12 col-md-12 col-lg-10 d-flex justify-content-around p-0">
                        <ul class="second-footer footer-list pl-0">
                            <li><h5><strong>{{ __('About us') }}</strong></h5></li>
                            <li>{{ __('Mission') }}</li>
                            <li> {{ __('Courses') }}</li>
                            <li>{{ __('Teaching') }}</li>
                            <li>{{ __('Contact') }}</li>
                        </ul>
                        <ul class="second-footer footer-list">
                            <li><h5><strong>{{ __('Learn') }}</strong></h5></li>
                            <li>{{ __('Learn English') }}</li>
                            <li> {{ __('Learn Spanish') }}</li>
                            <li>{{ __('Learn French') }}</li>
                            <li>{{ __('Learn Croatian') }}</li>
                        </ul>
                        <ul class="second-footer footer-list">
                            <li><h5><strong>{{ __('Social') }}</strong></h5></li>
                            <li>{{ __('Facebook') }}</li>
                            <li> {{ __('Instagram') }}</li>
                            <li>{{ __('Linkedin') }}</li>
                            <li>{{ __('Twitter') }}</li>
                        </ul>
                        <ul class="second-footer footer-list">
                            <li><h5><strong>{{ __('Legal') }}</strong></h5></li>
                            <li>{{ __('Terms of use') }}</li>
                            <li> {{ __('Privacy policy') }}</li>
                            <li>{{ __('Cookies policy') }}</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column text-center">
                        <hr class="second-footer-divider mb-0">
                        <h6 class="my-4">
                            ©{{ Date('Y') }} Lingua Planet. {{ __('All rights reserved') }}
                        </h6>
                    </div> 
                </div>
            </div>
        </footer>
    </div>  
</body>
<script type="text/javascript">
  
    var url = "{{ route('changeLang') }}";
  
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>
</html>
