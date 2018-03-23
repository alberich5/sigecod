<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sigecod</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="img/poli.ico">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            #welcome{
               background-image: url("img/playa2.jpg");
              background-attachment: fixed;
              background-repeat: no-repeat;
              background-size:100% 100%;
            }
            #login{
              color: #636b6f !important;
              text-decoration:none !important;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script type="text/javascript" src="js/nieve.js"></script>
    </head>
    <body id="welcome">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                      <!--  <a href="{{ url('/home') }}">Inicio</a>-->
                        <a href="{{ url('/posts') }}">Servicios</a>
                        <a href="{{ url('/howto') }}">Como usar?</a>
                    @else
                        <!--<a href="{{ url('/posts') }}">Atenciones</a>-->
                        <!--<a href="{{ url('/login') }}">Login</a>-->
                        <!--<a href="{{ url('/register') }}">Registrarse</a>-->
                        <!--<a href="{{ url('/howto') }}">Como usar?</a>-->
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <a href="{{ url('/login') }}" id="login"><h4>SIGEDCOD</h4></a>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
