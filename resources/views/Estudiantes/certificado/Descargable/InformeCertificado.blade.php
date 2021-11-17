<!doctype html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$certificado->curso->titulo}}</title>
    <style type="text/css">
        
       /** @font-face {
            font-family: 'gotham-bold';
            src: url({{ storage_path('fonts\Gotham-Font\GothamBold.ttf') }});
            font-weight: bold;
  
        }
        @font-face {
            font-family: 'gotham-black';
            src: url({{ storage_path('fonts\Gotham-Font\GothamBook.ttf') }});
            font-weight: bold;
        }
        @font-face {
            font-family: 'gotham-light';
            src: url({{ storage_path('fonts\Gotham-Font\GothamLight.ttf') }});
            font-weight: bold;
        }
        @font-face {
            font-family: 'montserrat-light';
            src: url({{ storage_path('fonts\Monte-Serrat\Montserrat-Light.ttf') }});
            font-weight: normal;
        }*/
       
        .pdfbgimg {
            width:27.5cm;
            height:21cm;
            position: fixed;
            top: -2cm;
            left: -1cm;
            z-index: -1
        }

        
        .certTitle {
            margin-top: 1cm;
            text-align: center;
            line-height: 1;
            font-size: 60px;
            color: #000000;
        }

        .certSubTitle {
            margin-top: 0.2cm;
            text-align: center;
            line-height: 1;
            font-size: 28px;
            color: #000000;
        }

        .certSubSubTitle {
            margin-top: 0.2cm;
            text-align: center;
            line-height: 1;
            font-size: 20px;
            color: #000000;
        }

        .certOwner {
            margin-top: 0.2cm;
            text-align: center;
            line-height: 1;
            font-size: 60px;
            color: #000000;
            text-transform: capitalize;
        }

        .certDesc {
            position: relative;
            margin-top: 0.2cm;
            text-align: center;
            width: 70%;
            left: 50%;
            transform: translate(-50%);
            margin-bottom: 0.5cm;
        }

        .certDesc p {
            font-size: 30px;
            text-shadow: 0px 0px 1px #CEB60B;
            line-height: 1;
            text-align: center;
        }

        .singatureArea {
            width: 60%;
            position: relative;
            left: 50%;
            transform: translate(-50%);
        }

        .tdA {
            font-size: 24px;
        }

        .tdB {
            margin-top: 20px;
            font-size: 24px;
            color: #243469;
        }
        .cont-logo{
            margin:2cm 3cm;
            width: 21cm;
            position:absolute;
            z-index:0;
        }
        .cont-dentro{
            display:flex;
            justify-content: center;
            align-items:center;
            position:absolute;
        }
        .otorga{
            text-align:center;
        }
        .cont-encargados{
            width: 100%;
            position:absolute;
        }
        .cont-encargados-texto-uno{
            width: 50%;
            position:absolute;
            left:0;
        }
        .cont-encargados-texto-dos{
            width: 50%;
            position:absolute;
            right:0;
        }
        .margen-uno{
            margin:3cm 0cm;
        }
        .dueno-certificado{
            font-size:1cm;
            margin-top:-0.1cm ;
            border-bottom:1px #000 solid;
        }
        .margen-p{
            margin:0
        }
        .color-otorga{
            color:#19255a;
        }
        .fuente-otorgado{
            letter-spacing:0.1cm;
            margin-top:3cm;
            position:absolute;
            left:40%;
            top:1cm;
        }
        .tam-logo{
            width: 5cm;
            height:1cm;
            position:absolute;
            left:1cm;
            top:1cm
        }
        .tam-logoD{
            width: 0.8cm;
            height:1cm;
            position:absolute;
            right:1cm;
            top:1cm
        }
        .cont-texto-diploma{
            position:absolute;
            top:4cm;
        }
        .bajar{
            margin-top:2cm;
            
        }
        .posicion{
            z-index:2;
        }
        .tam-firma{
            width: 3cm;
            height:3cm;
            position:absolute;
            right:1cm;
            top:1cm;
            z-index:0;
            top:-1.5cm;
            left:4cm;
        }
        .tam-firmad{
            width: 3cm;
            height:3cm;
            position:absolute;
            right:1cm;
            top:1cm;
            z-index:0;
            top:-2cm;
            left:4cm;
        }
        .margen-ols{
            margin-top:3.5cm;
        }
        .bajar-texto-ol{
            position:relative;
            top:1cm;
        }
        .aaa{
            height:2.5cm
        }
    </style>
</head>

<body>
    <div>
        <!--<img class="pdfbgimg" src="{{public_path('assets/A4.png')}}">-->
        <div class="main">
            <div class="cont-logo">
                <div class="cont-encargados ">
              
                </div>
                    
                <div class="cont-texto-diploma">
                <!--<img style="position:absolute;right:1cm; top:-3cm; width:6rem; height:7rem;" src="{{public_path('assets/bear.png')}}">-->
                    <h3 class="otorga color-otorga gotham-black " style=" font-family: 'titillium-Regular';font-size:1cm; margin-top:-2.5cm;color:#000">LINGUA INTERNATIONAL</h3>
                    <h1 class="otorga color-otorga gotham-black " style=" font-family: 'titillium-Regular'; font-size:2cm; font-weight:bold; color:#000; position:absolute;top:-2cm;  margin-left:5cm">CERTIFICATE</h1>
                    <h5 class="otorga color-otorga" style="font-family: 'titillium-Regular'; margin-top:0.8cm; color:#000; font-size:0.5cm;">TO</h5>
                    <div class="aaa">
                        <div style="display:flex; justify-content:center; width:43cm; margin-left:2.3cm; padding:1cm  font-size:2.5cm;">
                            <p class="otorga dueno-certificado gotham-black" style="color:#000; width:15cm;margin-bottom:1cm; font-family: 'taviraj-Light';  margin-top:-0.5cm;">{{$certificado->perfil->apodo}} </p>
                        </div>
                        <h3 class="otorga  bajar-texto-ol" style="font-family: 'titillium-Regular'; color:#000; margin-top:-2.5cm; width:15cm; margin-left:2.4cm; margin-bottom:0" >For successfully completing  </h3>
                    </div>
                    

                    <div class="cont-encargados">
                        <div class="cont-encargados-texto-uno bajar">
                      
                            <div class="posicion" style="margin-top:1.6cm;">
                                <h2 class="otorga gotham-black" style="font-family: 'titillium-Regular'; color:#000;  margin-bottom:-0.5cm"></h2>
                                <h5 class="otorga montserrat-light" style="font-family: 'titillium-Regular'; color:#000;  margin-bottom:-0.5cm"></h5>
                            </div>
                        </div>
                            <h5 style="font-family: 'titillium-Regular'; color:#000; margin-top:2cm; margin-left:9.5cm; font-size:0.5cm;">  HORAS</h5>
                        <div class="cont-encargados-texto-dos bajar" >
                       
                            <div class="posicion" style="margin-top:-2cm;">
                                <h2 class="otorga  gotham-black" style="font-family: 'titillium-Regular';  margin-bottom:-0.5cm"> JOHN DOE</h2>
                                <h5 class="otorga  montserrat-light" style="font-family: 'titillium-Regular';">INSTRUCTOR</h5>
                            </div>
                        </div>
                    </div>
                    <h5 style="font-family: 'titillium-Regular'; color:#000; margin-top:6cm; margin-left:8.5cm; font-size:0.5cm; text-align: start"> {{$certificado->created_at}}</h5>
                </div>
            
            </div>
        </div>
    </div>
</body>

</html>