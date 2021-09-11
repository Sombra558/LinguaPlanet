<nav class="navbar navbar-expand-md h-25" style="background-color: transparent;">
    <div id="hijo-nav" class="container d-flex" style="position: relative; z-index:1;">
        @if(request()->routeIs('student.premios'))
            <a href="{{ url()->previous() }}">
                <img src="/images/back-yellow.svg">
            </a>
        @else
            @unless(request()->routeIs('student.actividad'))
                <div style="position : relative; width : 100px; height : 100px;">
                    <div class="header-animal-icon mb-2" style="background-color : #FAB500;">
                        <cara-avatar class="w-100 h-100" :perfil="{{ $perfil }}"/>
                    </div>
                    <span class="nickname-header">{{ $perfil->apodo }}</span>
                </div>
            @endunless
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
                                        <div class="icon-menu-student" style="padding : 0.2rem; background-color: #FAB500;">
                                            <cara-avatar class="w-100 h-100" :perfil="{{ $perfil }}"/>
                                        </div>
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
                    @if(request()->routeIs('student.activities'))
                        <li class="nav-item mx-4">
                            <a href="/home/app/{{ request()->route()->parameters()['id'] }}/{{ request()->route()->parameters()['apodo'] }}/idiomas">
                                <svg width="93" height="93" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clipEarth)">
                                        <rect width="87" height="87" rx="43.5" fill="#0092D2"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4084 -5.69734C19.7167 -5.6308 22.5942 -1.51732 26.1546 0.91463C29.8633 3.44787 35.6164 4.44296 36.6589 8.81789C37.7109 13.2332 33.226 16.8902 30.8875 20.7779C29.1329 23.6948 27.1981 26.2597 24.7476 28.6197C21.8647 31.3963 19.3891 35.3076 15.4084 35.6856C11.3628 36.0698 7.79218 33.1532 4.68826 30.5246C1.77334 28.056 -0.20462 24.8354 -1.60476 21.2774C-3.09083 17.5012 -4.69585 13.4574 -3.56174 9.56039C-2.41367 5.6154 1.22099 3.15106 4.41892 0.578968C7.78963 -2.1321 11.0869 -5.76407 15.4084 -5.69734Z" fill="#00A53F"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M73.0145 17.5648C76.355 17.7858 79.3151 19.5809 82.2169 21.2404C84.9812 22.8213 88.2228 24.2195 89.6272 27.0655C91.0298 29.9079 89.7685 33.2781 89.7193 36.4435C89.6798 38.9773 89.4782 41.4106 89.3645 43.9422C89.2289 46.9618 90.0858 50.0723 88.9809 52.8884C87.7743 55.9638 85.9534 59.3552 82.8531 60.5388C79.7139 61.7374 76.2723 59.8135 73.0145 58.9843C70.328 58.3005 67.7488 57.4395 65.3363 56.0801C63.0242 54.7774 60.6015 53.4295 59.1871 51.1931C57.8085 49.0132 58.9581 45.8961 57.5351 43.7447C55.108 40.075 48.4713 38.9921 48.2175 34.6077C48.0005 30.8573 53.881 29.8371 56.5779 27.205C58.9463 24.8935 60.344 21.6593 63.2027 19.9826C66.1416 18.2589 69.6097 17.3396 73.0145 17.5648Z" fill="#00A53F"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M41.3298 54.6108C43.6303 55.3384 45.3774 57.2035 47.6544 58.0016C50.0104 58.8274 53.4036 57.4268 54.9506 59.3851C56.633 61.5147 53.9474 65.0072 55.1214 67.4537C56.2712 69.8499 60.3348 69.9717 61.2315 72.4736C62.0501 74.7579 59.3383 77.0366 59.4247 79.4615C59.5517 83.0294 62.7822 86.3549 61.8483 89.801C61.0172 92.8679 57.995 95.5233 54.8884 96.1997C51.4935 96.939 48.2297 92.4439 44.916 93.4881C40.9678 94.7322 39.9589 100.536 36.1307 102.111C32.4096 103.641 27.5894 104.132 24.1621 102.025C20.7379 99.9197 19.9502 95.2127 18.6995 91.3946C17.6169 88.0896 17.2455 84.6195 17.3219 81.1427C17.3888 78.0966 17.3994 74.7753 19.1199 72.2598C20.8877 69.6752 26.9884 70.2664 26.9015 67.1369C26.717 60.4997 15.693 55.2964 18.4811 49.2695C20.6446 44.5929 28.2171 52.2678 33.2373 53.4413C35.914 54.0671 38.709 53.7818 41.3298 54.6108Z" fill="#00A53F"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clipEarth">
                                            <rect width="87" height="87" rx="43.5" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if(request()->routeIs('student.armario'))
                        <li class="nav-item mr-4">
                            <a href="{{ url()->previous() }}">
                                <img src="/images/back-yellow.svg">
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
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