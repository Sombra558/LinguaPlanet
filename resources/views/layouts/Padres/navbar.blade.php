<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container d-flex">
        <a class="navbar-brand m-0" href="{{ url('/') }}">
            <img style="width: 90px; height: 90px;" src="{{ asset('/images/logo.svg') }}" class="logo" alt="{{ config('app.name', 'Laravel') }}">
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-primary mx-3" href="/home/detalles-avances/cursos"><span class="h6">{{ __('Courses') }}</span></a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-primary mx-3" href="/home/detalles-pagos/membresias"><span class="h6">{{ __('Memberships') }}</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-primary mx-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <div class="globe-profile">
                            {{ Auth::user()->name[0].Auth::user()->lastname[0] }}
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div class="dropdown-item d-flex mb-3">
                            <div class="globe-profile">
                                {{ Auth::user()->name[0].Auth::user()->lastname[0] }}
                            </div>
                            <div class="ml-2 d-flex flex-column">
                                <span class="color-dark h6 mb-0">{{ Auth::user()->name.' '.Auth::user()->lastname }}</span>
                                <small class="color-gray">{{ Auth::user()->email }}</small>
                            </div>
                        </div>
                        <a class="dropdown-item mt-1" href="{{ route('padre.perfil') }}">
                            <span class="color-plomo">Perfil</span>
                        </a>
                        <a class="dropdown-item mt-1" href="{{ route('padre.pagos') }}">
                            <span class="color-plomo">Pagos</span>
                        </a>
                        <a class="dropdown-item pt-2" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                        >
                            <span class="color-plomo">{{ __('Logout') }}</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    @unless(false !== true)
        <div class="container d-flex">
            <div class="w-10">
                @if(!request()->routeIs('perfil-user.create'))
                    <button class="w-10 toggle-father-details img-btn">
                        <img class="iz-60"  src="{{ asset('/images/bgray-lock.svg') }}">
                    </button>
                @else
                <div>
                    <span class="h6">Salir</span>
                </div>
                @endif
            </div>
            <a class="navbar-brand m-0" href="{{ url('/') }}">
                <img style="width: 90px; height: 90px;" src="{{ asset('/images/logo.svg') }}" class="logo" alt="{{ config('app.name', 'Laravel') }}">
            </a>
            <div class="p-3">
                @if(!request()->routeIs('perfil-user.create'))
                    <button class="w-10 btn-logout" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <img class="logout-image" src="{{ asset('images/logout.svg') }}">
                        <span class="text-primary-red span-logout">Cerrar sesión</span>
                    </button>    
                @endif
            </div>                
        </div>
    @endunless
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>