<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand m-0" href="{{ url('/') }}">
            <img src="{{ asset('/images/logo.svg') }}" class="logo light" alt="{{ config('app.name', 'Laravel') }}">
            <img src="{{ asset('/images/blue-logo.svg') }}" class="logo blue" alt="{{ config('app.name', 'Laravel') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-icon">
                <svg width="48" height="33" viewBox="0 0 48 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="5.48387" rx="2.74194" fill="#31348B"/>
                    <rect y="13.4839" width="48" height="5.48387" rx="2.74194" fill="#31348B"/>
                    <rect y="26.9678" width="48" height="5.48387" rx="2.74194" fill="#31348B"/>
                </svg>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" >
                    <a class="nav-link text-primary" href="https://lingua.alaxatech.com/">{{ __('Home') }}</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link text-primary" href="{{ route('courses.index') }}">{{ __('Courses') }}</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link text-primary" href="https://lingua.alaxatech.com/acerca-de-nosotros/">{{ __('About') }}</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link text-primary" href="https://lingua.alaxatech.com/contactanos/">{{ __('Contact us') }}</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @guest
                    @if(Route::has('register'))
                        <li class="nav-item nav-item-register">
                            <a class="nav-link btn-nav-signUp" href="{{ route('register') }}">{{ __('Get Start') }}</a>
                        </li>
                    @endif
                    <li class="nav-item mx-3">
                        <a class="nav-link btn-nav-signIn" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                    </li>
                    <li class="nav-item" >
                        @php
                        $banderaselected="/img/Banderas/argentina.svg";
                                 foreach($idiomas as $idioma){
                                     if(session()->get('locale') == $idioma->diminutivo){
                                        $banderaselected=$idioma->src;
                                     }
                                 }

                        @endphp
                        <div class="contenedor-padre">
                            <img class="banderaselected" src="{{$banderaselected}}" alt="badera">
                            <select class="col-10 form-control changeLang">
                                @foreach($idiomas as $idioma)   
                            
                                    <option value="{{$idioma->diminutivo}}" {{ session()->get('locale') == $idioma->diminutivo ? 'selected' : '' }}>{{$idioma->diminutivo}}</option>
                                @endforeach
                            </select>
                        </div>
                       
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>