<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Traspasalo')</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body class="bg-purple-950">
<header>
    @include('partials.nav')
</header>
<main>
    @yield('content')
</main>

@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>
