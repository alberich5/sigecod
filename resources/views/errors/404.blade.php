<!DOCTYPE html>
<html>
    <head>
        <title>No encontrado.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
              background-image: url("img/prueba2.jpg");
             background-attachment: fixed;
             background-repeat: no-repeat;
             background-size:100% 100%;
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><h3>NO SE ENCUENTRA LA RUTA</h3> </div>
                <div class="title"><h4><a href="{{ url('/posts') }}">Inicio</a></h4> </div>
            </div>
        </div>
    </body>
</html>
