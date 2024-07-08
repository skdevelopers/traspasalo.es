<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'Traspasalo')</title>
    @vite('resources/css/app.css')
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100 font-poppins">
<header class="relative z-30">
    @include('partials.nav')
</header>
<main>
    @yield('content')
</main>

@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>
