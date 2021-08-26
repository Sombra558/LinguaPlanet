<nav class="navbar navbar-expand-md h-25" style="background-color: transparent;">
    <div class="container d-flex" style="position: relative; z-index:1;">
        @if(request()->routeIs('student.premios'))
            <a href="{{ url()->previous() }}">
                <img src="/images/back-yellow.svg">
            </a>
        @else
            <div style="position : relative; width : 100px; height : 100px;">
                <img class="header-animal-icon mb-2"
                     src="{{$perfil->animal->cara}}"
                     style="background-color : #FAB500;"
                >
                <span class="nickname-header">{{ $perfil->apodo }}</span>
            </div>
            <ul class="navbar-nav ml-auto">
                
                @if(request()->routeIs('student.home'))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link mx-3" style="border-radius: 50px;padding: 18px 10px 16px 10px;height: 103%;width: 72%;text-align: center;border: 4px solid black; background-color : #FAB500;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg width="48" height="33" viewBox="0 0 48 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="5.48387" rx="2.74194" fill="black"/>
                                <rect y="13.4839" width="48" height="5.48387" rx="2.74194" fill="black"/>
                                <rect y="26.9678" width="48" height="5.48387" rx="2.74194" fill="black"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-student" aria-labelledby="navbarDropdown">
                            <div class="dropdown-item py-2">
                                <a href="/home" class="d-flex" style="height: 50px;">
                                    <div class="globe-profile-student h-100">
                                        <img class="icon-menu-student"
                                             style="background-color: #FAB500;"
                                             src="{{$perfil->animal->cara}}"
                                        >
                                    </div>
                                    <span class="ml-4 d-flex flex-column justify-content-center">
                                        <span class="color-dark h5 mb-0">
                                            Cambiar de perfil
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-item py-2" href="{{ route('padre.perfil') }}">
                                <button class="toggle-father-details px-0 img-btn d-flex align-items-center" style="height: 50px;">
                                    <div
                                        class="icon-menu-student"
                                        style="background-color: #FAB500;"
                                    >
                                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#lock)">
                                                <rect width="50" height="50" rx="25"/>
                                                <path d="M31.687 21.9062H17.312C16.915 21.9062 16.5932 22.228 16.5932 22.625V32.6875C16.5932 33.0845 16.915 33.4062 17.312 33.4062H31.687C32.0839 33.4062 32.4057 33.0845 32.4057 32.6875V22.625C32.4057 22.228 32.0839 21.9062 31.687 21.9062Z" stroke="#31348B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M21.2651 21.9062V18.6719C21.2651 17.8141 21.6058 16.9914 22.2124 16.3848C22.819 15.7783 23.6416 15.4375 24.4995 15.4375C25.3573 15.4375 26.1799 15.7783 26.7865 16.3848C27.3931 16.9914 27.7338 17.8141 27.7338 18.6719V21.9062" stroke="#31348B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="h5 ml-4 text-primary">
                                        Sesión de padres
                                    </span>
                                </button>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="/home/app/{{ request()->route()->parameters()['id'] }}/{{ request()->route()->parameters()['apodo'] }}/">
                            <img src="/images/home-student.svg">
                        </a>
                    </li>
                @endif
            </ul>
        @endif
    </div>

    @unless(false !== true)
        <div class="container d-flex">
            <div class="w-10">
                @if(!request()->routeIs('perfil-user.create'))
                    <button class="w-10 toggle-father-details img-btn">
                        <img class="iz-60"  src="{{ asset('storage/images/bgray-lock.svg') }}">
                    </button>
                @else
                <div>
                    <span class="h6">Salir</span>
                </div>
                @endif
            </div>
            <a class="navbar-brand m-0" href="{{ url('/') }}">
                <img style="width: 90px; height: 90px;" src="{{ asset('storage/images/logo.svg') }}" class="logo" alt="{{ config('app.name', 'Laravel') }}">
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