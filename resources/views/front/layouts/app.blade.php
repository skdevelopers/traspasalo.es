<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta  name="Bienvenido a Traspásalo.es" content="Expertos en gestión de bienes raíces, configuración de tiendas y soluciones de trabajo en línea para impulsar tu negocio.">
<meta name="Author" content="Salman@everestbuys.com">

<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('/images/fav_icon.svg') }}">

    <title>@yield('title', 'Traspasalo.es')</title>
    @vite('resources/scss/app.scss')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-100 font-poppins">
    <header class="relative z-30">
        @include('front.partials.nav')
    </header>
    <main>
        @yield('content')
    </main>


    @vite('resources/js/app.js')
    @stack('scripts')
    <script>
        const originalWarn = console.warn;

        // Override the console.warn function
        console.warn = function(message) {
            if (message.includes('Google Maps JavaScript API has been loaded directly')) {
                // Ignore this specific warning
                return;
            }

            // Call the original console.warn for other warnings
            originalWarn.apply(console, arguments);
        };
    </script>
</body>

</html>
