@extends('front.layouts.app')

@section('title', 'Newsletter')
@section('header-title', 'Newletter')
@section('header-subtitle', '')


@section('content')
    @include('front.partials.banner')
    <!-- Section with Images and Text -->
    <div class="py-20 bg-white">
        <div class="relative container xl:container-xl px-4 mx-auto bg-white">
            <div class="grid grid-cols-12">
                <!-- Main image on the left -->
                <div class="col-span-12 lg:col-span-6">
                    <img src="{{ asset('/front/assets/images/dream-business.jpg') }}" alt="Main Image"
                        class="w-full h-auto object-cover rounded-lg">
                </div>
                <!-- Text and smaller images on the right -->
                <div class="col-span-12 lg:col-span-6 pr-10">
                    <h2 class="text-5xl font-bold text-orange-500">5 </h2><span class="text-base text-black">STARS</span>
                    <h3 class="text-4xl font-semibold mt-4">Your Dream Business, Our Commitment to Find</h3>
                    <p class="mt-4 text-sm">
                        We go beyond simply locating premises. We are dedicated to uncovering and securing the perfect
                        business opportunities tailored to your needs. Our expertise and commitment ensure that your path to
                        business success is clear and achievable. Let us help you find not just a place, but the ideal
                        environment where your business can thrive.
                    </p>
                   
                    <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <input type="email" class="mt-4 px-6 py-3 text-black text-2xl rounded" name="email"
                            placeholder="Enter your email" required>
                        <button type="submit"
                            class="w-[200px] h-[60px] mt-2 px-6 py-3 bg-purple-700 text-white rounded">Join Us Now</button>
                    </form>
                    @if (session('success'))
                    <div class="alert alert-success text-green-400">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="flex justify-end mt-4">
                        <!-- Two smaller images below -->
                        <div class="flex w-[280px] h-[180px] gap-4">
                            <img src="{{ asset('/front/assets/images/image.png') }}" alt="Small Image 2"
                                class="w-full h-full object-cover rounded-lg">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('front.partials.footer')
@endsection
