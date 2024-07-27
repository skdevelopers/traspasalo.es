<!DOCTYPE html>
<html lang="en" data-sidenav-view="{{ $sidenav ?? 'default' }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.shared/title-meta', ['title' => $title])
    @yield('css')
    @include('layouts.shared/head-css')
    @stack('styles')
</head>

<body>
    @if (session('lock-screen'))
        <script>
            window.location.href = '{{ route('lock-screen') }}';
        </script>
    @endif

    <div class="flex wrapper">

        @include('layouts.shared/sidebar')

        <div class="page-content">

            @include('layouts.shared/topbar')

            <main class="flex-grow p-6">

                @include('layouts.shared/page-title', [
                    'title' => $title,
                    'sub_title' => $sub_title,
                ])

                @yield('content')

            </main>

            @include('layouts.shared/footer')

        </div>

    </div>

    @include('layouts.shared/customizer')

    @include('layouts.shared/footer-scripts')

    @vite(['resources/js/app.js'])
    <script>
        document.getElementById("year").innerHTML = (new Date().getFullYear());
    </script>
    <script>
        let inactivityTime = function () {
            let time;
            function resetTimer() {
                clearTimeout(time);
                time = setTimeout(lock, 300000); // 5 minutes of inactivity
            }

            function lock() {
                fetch('/lock-screen', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.href = '{{ route('lock-screen') }}';
                    }
                });
            }

            window.onload = resetTimer;
            document.onmousemove = resetTimer;
            document.onkeypress = resetTimer;
            document.onscroll = resetTimer;
            document.onclick = resetTimer;
        };

        inactivityTime();

    </script>

    @stack('scripts')
</body>


</html>
