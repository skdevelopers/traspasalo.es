<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'Traspasalo')</title>
    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none !important;
        }
        .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999; /* Ensure this is higher than the banner z-index */
}

.modal-content {
    background: white;
    border-radius: 0.5rem;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 36rem;
    position: relative;
    z-index: 10000; /* Ensure this is higher than the banner z-index */
    display: flex;
    flex-direction: column;
    max-height: calc(100vh - 50px); /* Adjust as needed */
}

.modal-header, .modal-footer {
    flex-shrink: 0;
}

.modal-body {
    flex-grow: 1;
    overflow-y: auto;
    padding: 1rem;
}
/* Custom scrollbar styles */
.modal-body::-webkit-scrollbar {
            width: 8px;
        }
        .modal-body::-webkit-scrollbar-thumb {
            background-color: #3f0d7e; /* Customize the scrollbar thumb color */
            border-radius: 4px;
        }
        .modal-body::-webkit-scrollbar-track {
            background-color: #f3f4f6; /* Customize the scrollbar track color */
        }

   </style>
    @stack('styles')
</head>
<body class="bg-gray-100 font-poppins">
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
