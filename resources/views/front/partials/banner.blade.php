@push('styles')
    <style>
        .bg-banner {
            background: url('/front/assets/images/bg-banner.svg') no-repeat center center;
            background-size: cover;
            position: relative;
            height: 382px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .bg-banner::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            background: rgba(39, 11, 121, 0.70);
            width: 100%;
            height: 100%;
            z-index: 0;
        }
    </style>
@endpush

<section class="bg-banner">
    <div class=" text-center z-0">
        <!-- Heading Content -->
        <div class="flex flex-col">
            <h1 class="text-4xl text-white font-bold">@yield('header-title', 'Traspasalo')</h1>
            <p class="mt-2 text-sm text-gray-300">@yield('header-subtitle', '')</p>
        </div>
    </div>
</section>
