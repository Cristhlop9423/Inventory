<!-- Stored in resources/views/layouts/app.blade.php -->
 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="css/app.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <title>ISJL - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-12 text-center">
                        <img class="rounded" src="{{ URL::asset('images/logo.png') }}" alt="logo" style="width: 100px; height: 100px;">
                    </div>
                    <div class="col-md-1 col-sm-4 col-6 mt-4 text-left links">
                        <a href="{{ route('getInventory') }}">Inventario</a>
                    </div>
                    <div class="col-md-1 col-sm-4 col-6 mt-4 text-left links">
                        <a href="https://santajuanalestonnac.edu.co/contactenos/">Contactenos</a>
                    </div>
                    <div class="col-md-1 col-sm-4 col-6 mt-4 text-left links">
                        <a href="https://santajuanalestonnac.edu.co/noticias/">Noticias</a>
                    </div>
                    <div class="col-md-1 col-sm-4 col-6 mt-4 text-left links">
                        <a href="https://www.instagram.com/iesjl/">Instagram</a>
                    </div>
                    <div class="col-md-1 col-sm-4 col-6 mt-4 text-left links">
                        <a href="https://www.facebook.com/Iesjldqdas/">Facebook</a>
                    </div>
                    <div class="col-md-1 col-sm-4 col-6 mt-4 text-left links">
                        <a href="https://sites.google.com/santajuanalestonnac.edu.co/dudasfrecuentes/inicio">PQR's</a>
                    </div>
                </div>                
            </div>
        @show
 
        <div class="container">
            @yield('content')
        </div>
    </body>
    <footer>
        <p style="text-align: center;">copyright all rights reserved 2024 - 2025</p>
    </footer>
</html>
<script src="js/app.js"></script>