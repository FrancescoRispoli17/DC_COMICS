<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/84c04c9e02.js" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    <style>
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease;
        }

        #caricamento{
            font-family: Arial, Helvetica, sans-serif;
        }

        .spinner {
            width: 50px;
            height: 50px;
            animation: rotate4 2s linear infinite;
        }

        .path {
            stroke: hsl(214, 97%, 59%);
            stroke-width: 4;
            stroke-linecap: round;
            fill: none;
            animation: dash4 1.5s ease-in-out infinite;
        }

        @keyframes rotate4 {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes dash4 {
            0% {
                stroke-dasharray: 1, 150;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -35;
            }
            100% {
                stroke-dashoffset: -120;
            }
        }
    </style>
</head>

<body>
    <div id="loader" class="loader">
        <!-- Aggiungi qui un'animazione di caricamento o un semplice testo "Caricamento..." -->
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20"></circle>
        </svg>
        <span id="caricamento">Caricamento</span>
    </div>

    <div id="app" style="display:none;">

        @include('shared.header')
        <main class="">
            @yield('content')
        </main>
        @include('shared.footer')
    </div>

    <script>
        window.addEventListener('load', function() {
            // Nasconde il loader e mostra il contenuto con una transizione
            // document.getElementById('loader').style.opacity = '0';
           
                document.getElementById('loader').style.display = 'none';
                document.getElementById('app').style.display = 'block';
            // Ritardo per la transizione (0.5 secondi)
        });
    </script>
</body>

</html>
