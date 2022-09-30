<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$actividad->tipo}}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('dist/js/hijo-app.js') }}" defer></script>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  

    <script src="/game/Silueta/Siluetas/Build/Siluetas.loader.js"></script>
    <script src="/game/Memorama/Memorama/Build/Memorama.loader.js"></script>
 

    <style>
        body {
            font-family: "Nunito", sans-serif !important;
        }
    </style>
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
         <canvas class="h-100 d-flex justify-content-center align-items-center" id="unity-canvas" style="height: 1080px; background: #231F20"></canvas>
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
       createUnityInstance(document.querySelector("#unity-canvas"), {
        dataUrl: "/game/Silueta/Siluetas/Build/Siluetas.data",
        frameworkUrl: "/game/Silueta/Siluetas/Build/Siluetas.framework.js",
        codeUrl: "/game/Silueta/Siluetas/Build/Siluetas.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "Abstract Studios Mx",
        productName: "Lingua-Planet",
        productVersion: "1.0",
   
      });
    </script>
    @elseif($actividad->tipo==='Mochila')
    <script>
         createUnityInstance(document.querySelector("#unity-canvas"), {
        dataUrl: "/game/Mochila/Mochila/Build/Mochila.data",
        frameworkUrl: "/game/Mochila/Mochila/Build/Mochila.framework.js",
        codeUrl: "/game/Mochila/Mochila/Build/Mochila.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "Abstract Studios Mx",
        productName: "Lingua-Planet",
        productVersion: "1.0",
        // matchWebGLToCanvasSize: false, // Uncomment this to separately control WebGL canvas render size and DOM element size.
        // devicePixelRatio: 1, // Uncomment this to override low DPI rendering on high DPI displays.
      });
    </script>
     @elseif($actividad->tipo==='Memorama')
    <script>
        createUnityInstance(document.querySelector("#unity-canvas"), {
        dataUrl: "/game/Memorama/Memorama/Build/Memorama.data",
        frameworkUrl: "/game/Memorama/Memorama/Build/Memorama.framework.js",
        codeUrl: "/game/Memorama/Memorama/Build/Memorama.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "Abstract Studios Mx",
        productName: "Lingua-Planet",
        productVersion: "1.0",
        // matchWebGLToCanvasSize: false, // Uncomment this to separately control WebGL canvas render size and DOM element size.
        // devicePixelRatio: 1, // Uncomment this to override low DPI rendering on high DPI displays.
      });
   
    </script>
     @elseif($actividad->tipo==='Simon Dice')
    <script>
         if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
        // Mobile device style: fill the whole browser client area with the game canvas:
        var meta = document.createElement('meta');
        meta.name = 'viewport';
        meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
        document.getElementsByTagName('head')[0].appendChild(meta);
      }

      createUnityInstance(document.querySelector("#unity-canvas"), {
        dataUrl: "/game/Simon/Simon/Build/SimonDice.data",
        frameworkUrl: "/game/Simon/Simon/Build/SimonDice.framework.js",
        codeUrl: "/game/Simon/Simon/Build/SimonDice.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "Abstract Studios Mx",
        productName: "Lingua-Planet",
        productVersion: "1.0",
        // matchWebGLToCanvasSize: false, // Uncomment this to separately control WebGL canvas render size and DOM element size.
        // devicePixelRatio: 1, // Uncomment this to override low DPI rendering on high DPI displays.
      });
    </script>
    @else
    <script>
        if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
        // Mobile device style: fill the whole browser client area with the game canvas:
        var meta = document.createElement('meta');
        meta.name = 'viewport';
        meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
        document.getElementsByTagName('head')[0].appendChild(meta);
      }

      createUnityInstance(document.querySelector("#unity-canvas"), {
        dataUrl: "/game/Rompecabeza/Rompecabezas/Build/Rompecabezas.data",
        frameworkUrl: "/game/Rompecabeza/Rompecabezas/Build/Rompecabezas.framework.js",
        codeUrl: "/game/Rompecabeza/Rompecabezas/Build/Rompecabezas.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "Abstract Studios Mx",
        productName: "Lingua-Planet",
        productVersion: "1.0",
        // matchWebGLToCanvasSize: false, // Uncomment this to separately control WebGL canvas render size and DOM element size.
        // devicePixelRatio: 1, // Uncomment this to override low DPI rendering on high DPI displays.
      });
    
    </script>
    @endif
    
    <div class="backdrop"></div>
</body>
</html>
