<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$actividad->tipo}}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('dist/js/hijo-app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('css/styles.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    <script src="/game/Silueta/Siluetas/TemplateData/UnityProgress.js"></script>
    <script src="/game/Silueta/Siluetas/Build/UnityLoader.js"></script>
</head>
<body class="bg-primary @if(request()->routeIs('student.premios') || request()->routeIs('student.armario')) background-component @endif">
    <div class="d-flex h-screen flex-column justify-content-between">
        @if($actividad->tipo==='Palabras del día' || $actividad->tipo==='Video de apertura' || $actividad->tipo==='Actividad' || $actividad->tipo==='Libros')
        <div id="hijo-app" class="h-100 d-flex justify-content-center align-items-center">
            <main class="flex-grow-1">
                @yield('content')
            </main>
        </div>
        <div class="left-panel container bg-primary">
            <div class="row py-3">
                <div class="col-12 text-right">
                    <label class="mb-0" for="check">
                        <button class="toggle-father-details img-btn">
                            <img class="iz-100"  src="{{ asset('/images/exit-icon.svg') }}">
                        </button>                    
                    </label>                
                </div>
            </div>                    
            <div class="row panel-content">
                <div class="col-12 text-center">
                    <img class="iz-40 mb-4" src="{{ asset('/images/bwhite-lock.svg') }}">
                    <h2 class="bold">Solo para adultos</h2>
                    <span>Para continuar por favor ingresa</span>
                    <div class="my-5">
                        <h2 class="color-yellow mb-4">Siete, Cuatro, Cinco</h2>
                        <input class="input-validation-father" type="text" name="number">
                        <input class="input-validation-father" type="text" name="number">
                        <input class="input-validation-father" type="text" name="number">
                    </div>
                    <button class="btn btn-primary-red"><span class="h4 px-2">Acceder</span></button>
                </div>
            </div>
        </div>
        @else
         <div class="h-100 d-flex justify-content-center align-items-center" id="unityContainer" ></div>
        @endif
    </div>
    <script type="text/javascript">
        $('.toggle-father-details').on('click', (e) => {
            $('.backdrop').toggleClass('show');
            $('.left-panel').toggleClass('show');
        });
    </script>
    <script>
        function myFunction(perfil_id) {
            alert("The video has ended"+ perfil_id);
        }
    </script>
    @if($actividad->tipo==='Silueta')
    <script>
      var unityInstance = UnityLoader.instantiate("unityContainer", "/game/Silueta/Siluetas/Build/Siluetas.json", {onProgress: UnityProgress});
    </script>
    @elseif($actividad->tipo==='Mochila')
    <script>
      var unityInstance = UnityLoader.instantiate("unityContainer", "/game/Mochila/Mochila/Build/Mochila.json", {onProgress: UnityProgress});
    </script>
     @elseif($actividad->tipo==='Memorama')
    <script>
      var unityInstance = UnityLoader.instantiate("unityContainer", "/game/Memorama/Memorama/Build/Memorama.json", {onProgress: UnityProgress});
    </script>
     @elseif($actividad->tipo==='Simon Dice')
    <script>
      var unityInstance = UnityLoader.instantiate("unityContainer", "/game/Simon/Simon/Build/Simon.json", {onProgress: UnityProgress});
    </script>
    @else
    <script>
      var unityInstance = UnityLoader.instantiate("unityContainer", "/game/Rompecabeza/Rompecabezas/Build/Rompecabezas.json", {onProgress: UnityProgress});
    </script>
    @endif
    
    <div class="backdrop"></div>
</body>
</html>
