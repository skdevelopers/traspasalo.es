@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <style>
        .bg-banner {
            background: url('/assets/images/bg-banner.svg') no-repeat center center;
            background-size: cover;
            position: relative;
            /* height: 445px; */
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

@section('content')
    <section class="bg-banner lg:h-[445px] h-auto">
        <div class=" text-center z-0">
            <div class="container lg:pt-24 pt-5">
                <!-- Heading Content -->
                <div class="flex flex-col lg:pt-20 pt-0">
                    <h1 class="text-4xl text-white font-bold">Find Your Business</h1>
                    <p class="mt-2 text-sm text-gray-300">WE HELP YOU FIND YOUR IDEAL TRANSFER</p>
                </div>
                <!-- Search Area -->
                <div class="container px-4 mx-auto mt-8 position-relative">
                    <div
                        class="bg-white rounded px-4 py-4 flex flex-wrap justify-start items-start mx-auto w-full md:max-w-max lg:max-w-max">
                        <div class="flex-1 lg:min-w-[200px] min-w-full p-1">
                            <input type="text" placeholder="Search By Keyword" class="w-full p-2 border-1 rounded-lg border-gray-300">
                        </div>
                        <div class="flex-1 lg:min-w-[200px] min-w-full p-1">
                            <select class="w-full p-2 border-1 rounded-lg border-gray-300">
                                <option>Operation Type</option>
                            </select>
                        </div>
                        <div class="flex-1 lg:min-w-[200px] min-w-full p-1">
                            <select class="w-full p-2 border-1 rounded-lg border-gray-300">
                                <option>Business Type</option>
                            </select>
                        </div>
                        <div class="flex-1 lg:min-w-[200px] min-w-full p-1">
                            <select class="w-full p-2 border-1 rounded-lg border-gray-300">
                                <option>Location</option>
                            </select>
                        </div>
                        <div class="flex-1 p-1">
                            <button class="w-full bg-orange-500 text-white p-2 rounded">Find Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container xl:container-xl">
            <div x-data="carousel()" class="relative flex items-center justify-center w-full h-full lg:py-16 py-y mt-10">
                <button @click="prev"
                    class="w-10 h-10 absolute -left-10 z-10  text-white bg-orange-500 rounded-full focus:outline-none">
                    &lt;
                </button>
                <div class="overflow-hidden w-full">
                    <div class="flex transition-transform duration-500"
                        :style="`transform: translateX(-${currentSlide * (100 / slidesToShow)}%); width: ${slides.length * (100 / slidesToShow)}%`">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div class="flex-shrink-0 p-1">
                                <div class=" w-[181px] h-[128px] bg-white rounded-lg shadow-sm flex flex-col justify-center items-center">
                                    <div class="flex flex-col justify-center items-center">
                                        <img :src="slide.image" alt="" class="w-12 h-12 mx-auto mb-2">
                                        <p class="text-center whitespace-nowrap text-sm" x-text="slide.text"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <button @click="next"
                    class="w-10 h-10 absolute -right-11 z-10  text-white bg-orange-500 rounded-full focus:outline-none">
                    &gt;
                </button>
            </div>
        </div>
    </section>

    <section class="pt-32">
        <div class="text-center pb-20">
            <h2 class="text-[28px] font-bold">Explore Profitable Business Ventures</h2>
            <p class="mt-2 text-lg text-gray-600">We Discover Your Business Success</p>
        </div>
        <div class="container xl:container-xl flex justify-center items-center py-8 relative" x-data="sliderData()">
            <button @click="prev()" class="prev1 absolute left-0 z-10 bg-violet-950 text-white p-2 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <div class="overflow-hidden w-full max-w-6xl mx-2">
                <div class="slider flex transition-transform duration-500" :style="`transform: translateX(-${currentIndex * 100 / visibleSlides}%)`">
                    <template x-for="(hotel, index) in hotels" :key="index">
                        <div class="slide flex-none w-full md:w-1/3 lg:w-1/4 p-1">
                            <div class="bg-white rounded-lg shadow-lg">
                                <img :src="hotel.image" alt="Hotel" class="w-full h-44 object-cover">
                                <div class="p-4">
                                    <h3 class="text-md" x-text="hotel.name"></h3>
                                    <p class="text-gray-600 text-sm">
                                        <img src="assets/images/location-filled.svg" alt="location icon"/> <span x-text="hotel.location"></span>
                                    </p>
                                    <p class="text-yellow-500 mt-1" x-text="'⭐ ' + hotel.rating + ' (' + hotel.reviews + ' reviews)'"></p>
                                    <div class="flex p-2 justify-between">
                                        <p class="font-bold mt-2 text-sm" x-text="hotel.price"></p>
                                        <button class="mt-2 text-violet-800 px-2 py-1 border-2 border-violet-800 rounded">View &rarr;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <button @click="next()" class="next1 absolute right-0 z-10 bg-violet-950 text-white p-2 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </section>
    <!-- End Business Ventures Section -->

    <!-- Side by Side Section -->
    <div class="container xl:container-xl mx-auto px-4 pb-20 rounded-lg">
        <div class="block md:flex lg:flex rounded-lg overflow-hidden shadow-lg">
            <!-- Image Part -->
            <div class="w-full md:w-1/3 lg:w-2/5">
                <img src="{{ asset('/assets/images/18516.png') }}" alt="Business Image"
                    class="w-full h-full object-cover">
            </div>
            <!-- Text Part -->
            <div class="w-full md:w-2/3 lg:w-3/5 bg-violet-950 text-white p-4 md:p-6 lg:p-10 flex flex-col justify-center">
                <img src="{{ asset('/assets/images/logo-02.svg') }}" alt="Logo" class="h-12 w-12 mb-4">
                <h2 class="text-lg md:text-3xl mb-4">We Don’t Just Find Premises, We Discover Your Business Success</h2>
                <button class="bg-orange-500 text-sm font-poppins w-52 text-white p-4 rounded">Find Now</button>
            </div>
        </div>
    </div>


    <!-- Section with Images and Text -->
    <div class="py-20 bg-white">
        <div class="relative container xl:container-xl mx-auto bg-white">
            <div class="grid grid-cols-12">
                <!-- Main image on the left -->
                <div class="col-span-12 lg:col-span-6">
                    <img src="{{ asset('/assets/images/dream-business.jpg') }}" alt="Main Image" class="w-full h-auto object-cover rounded-lg">
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
                    <button class="w-[200px] h-[60px] mt-6 px-6 py-3 bg-purple-700 text-white rounded">Join Us Now</button>
                    <div class="flex justify-end mt-4">
                        <!-- Two smaller images below -->
                        <div class="flex w-[280px] h-[180px] gap-4">
                            <img src="{{ asset('/assets/images/image.png') }}" alt="Small Image 2"
                                class="w-full h-full object-cover rounded-lg">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid relative bg-violet-950 h-auto lg:h-[450px] pb-5 md-pb-0">
        <div class="container xl:container-xl relative px-4">
            <div class="block text-center md:text-left md:flex justify-between items-center text-white pt-10 md:pt-20 rounded-lg">
                <div>
                    <h2 class="text-xl md:text-2xl lg:text-4xl font-bold">Explore top Business</h2>
                    <p class="mt-2 mb-7 md:mb-0 text-lg">Our team’s business for consumers behind</p>
                </div>
                <button class="bg-orange-500 text-white font-semibold py-2 px-4 rounded hover:bg-orange-600 transition duration-300">
                    View All Business
                </button>
            </div>
        </div>

        <div class="container xl:container-xl px-4 bottom-0 lg:-bottom-1/3">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-20">
                <div class="relative">
                    <img src="{{ asset('/assets/images/business1.jpg') }}" alt="Real Estate"
                        class="w-full object-cover rounded-lg">
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                        <a href="#" class="px-4 py-2 bg-white text-black rounded-lg shadow-lg whitespace-nowrap">Real Estate
                            &rarr;</a>
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('/assets/images/business2.jpg') }}" alt="Business Consulting"
                        class="w-full object-cover rounded-lg">
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/3 w-full">
                        <a href="#" class="px-4 py-2 bg-white text-black rounded-lg shadow-lg whitespace-nowrap">Business Consulting
                            &rarr;</a>
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('/assets/images/business3.jpg') }}" alt="Real Estate"
                        class="w-full object-cover rounded-lg">
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                        <a href="#" class="px-4 py-2 bg-white text-black rounded-lg shadow-lg whitespace-nowrap">Cars Washer
                            &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Business Categories Section -->

    <!-- Easy Steps to Join Section -->
    <div class="pt-14 px-5 lg:px-20 lg:pt-96">
        <div class="max-w-xs md:max-w-5xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-2xl font-bold">Easy Steps to join Us!</h1>
                <p class="text-gray-600 mt-2">Embrace the advantages of property listing and become a part of our community
                    today!</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center md:text-left block md:flex items-center">
                    <div class="mr-4 flex justify-center md:justify-self-start">
                        <div class="w-12 h-12 bg-orange-100 flex items-center justify-center rounded-full">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l3-3 3 3m0 6l-3 3-3-3"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Easy registration</h3>
                        <p class="text-gray-500">Help people get to know you by listing your business. Showcase your
                            business with your outstanding media gallery.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center md:text-left block md:flex items-center">
                    <div class="mr-4 flex justify-center md:justify-self-start">
                        <div class="w-12 h-12 bg-orange-100 flex items-center justify-center rounded-full">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3v6h6M21 21v-6h-6M3 21h6v-6M21 3h-6v6"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Promote property listing</h3>
                        <p class="text-gray-500">Reach 3x more customers by featuring your listing on top of search
                            results. This will help you grow fast with us.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center md:text-left block md:flex items-center">
                    <div class="mr-4 flex justify-center md:justify-self-start">
                        <div class="w-12 h-12 bg-orange-100 flex items-center justify-center rounded-full">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 2a10 10 0 00-9.27 6H2l.17 1.03L2 9a9.98 9.98 0 001.95 5.91l.31.4.15.19A9.98 9.98 0 0012 22a9.98 9.98 0 007.93-3.5l.26-.33.34-.43A9.98 9.98 0 0022 12h-1.17A10.01 10.01 0 0012 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Get on the map</h3>
                        <p class="text-gray-500">We will show results on the map so your customers can easily find you.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center md:text-left block md:flex items-center">
                    <div class="mr-4 flex justify-center md:justify-self-start">
                        <div class="w-12 h-12 bg-orange-100 flex items-center justify-center rounded-full">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Great sales benefits</h3>
                        <p class="text-gray-500">With the help of standout on the top of result by showing your ads as
                            featured.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="container xl:container-xl px-4 py-10 md:py-28">
        <!-- Find Best Places Section -->
        <div class="container relative p-0">
            <img src="{{ asset('/assets/images/city.jpg') }}" alt="City"
                class="w-full h-96 object-cover rounded-xl">
            <div
                class="absolute inset-0 flex flex-col items-center justify-center bg-black opacity-65 rounded-lg text-white">
                <h2 class="text-lg text-center md:text-3xl md:text-left font-bold">Find Best Places in Your City</h2>
                <p class="mt-2 text-center md:text-left">We Help You Turn Your Ideas Into Reality</p>
                <button class="mt-4 bg-orange-500 px-4 py-2 rounded-md">Know More</button>
            </div>
        </div>
    </div>
    <!-- Success Stories Section -->
    <div class="py-20 bg-violet-950 text-white flex items-center justify-center min-h-screen">
        <div class="container xl:container-xl px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold mb-4">Our Clients' Success Stories</h2>
                <p class="text-gray-200">Discover the experiences of those who have achieved success with us</p>
            </div>
            <div class="flex justify-end pb-6">
                <button id="prev" class="bg-violet-950 text-gray-400 border-2 border-gray-400 px-2 py-2 rounded mr-2">
                    &larr;
                </button>
                <button id="next" class="bg-violet-950 text-gray-400 border-2 border-gray-400 px-2 py-2 rounded">
                    &rarr;
                </button>
            </div>

            <div class="relative slider-container">
                <div id="slider" class="slider space-x-8">
                    <!-- Slide 1 -->
                    <div class="bg-white text-black p-6 rounded-lg shadow-lg w-[366px] flex-shrink-0">
                        <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication
                            ensured outstanding results. We're thrilled with the seamless process and incredible
                            transformation. Highly recommend!</p>
                        <div class="flex items-center">
                            <img src={{ asset('assets/images/janathan-barkri.png') }} alt="User Image"
                                class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold">Jonathan Barkl</h3>
                                <p class="text-gray-600">Co-Founder and CEO</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="bg-white text-black p-6 rounded-lg shadow-lg w-[366px] flex-shrink-0">
                        <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication
                            ensured outstanding results. We're thrilled with the seamless process and incredible
                            transformation. Highly recommend!</p>
                        <div class="flex items-center">
                            <img src={{ asset('assets/images/janathan-barkri.png') }} alt="User Image"
                                class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold">Jonathan Barkl</h3>
                                <p class="text-gray-600">Co-Founder and CEO</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="bg-white text-black p-6 rounded-lg shadow-lg w-[366px] flex-shrink-0">
                        <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication
                            ensured outstanding results. We're thrilled with the seamless process and incredible
                            transformation. Highly recommend!</p>
                        <div class="flex items-center">
                            <img src={{ asset('assets/images/janathan-barkri.png') }} alt="User Image"
                                class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold">Jonathan Barkl</h3>
                                <p class="text-gray-600">Co-Founder and CEO</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="bg-white text-black p-6 rounded-lg shadow-lg w-[366px] flex-shrink-0">
                        <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication
                            ensured outstanding results. We're thrilled with the seamless process and incredible
                            transformation. Highly recommend!</p>
                        <div class="flex items-center">
                            <img src={{ asset('assets/images/janathan-barkri.png') }} alt="User Image"
                                class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold">Jonathan Barkl</h3>
                                <p class="text-gray-600">Co-Founder and CEO</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="bg-white text-black p-6 rounded-lg shadow-lg w-[366px] flex-shrink-0">
                        <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication
                            ensured outstanding results. We're thrilled with the seamless process and incredible
                            transformation. Highly recommend!</p>
                        <div class="flex items-center">
                            <img src={{ asset('assets/images/janathan-barkri.png') }} alt="User Image"
                                class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold">Jonathan Barkl</h3>
                                <p class="text-gray-600">Co-Founder and CEO</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 6 -->
                    <div class="bg-white text-black p-6 rounded-lg shadow-lg w-[366px] flex-shrink-0">
                        <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication
                            ensured outstanding results. We're thrilled with the seamless process and incredible
                            transformation. Highly recommend!</p>
                        <div class="flex items-center">
                            <img src={{ asset('assets/images/janathan-barkri.png') }} alt="User Image"
                                class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold">Jonathan Barkl</h3>
                                <p class="text-gray-600">Co-Founder and CEO</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 7 -->
                    <div class="bg-white text-black p-6 rounded-lg shadow-lg w-[366px] flex-shrink-0">
                        <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication
                            ensured outstanding results. We're thrilled with the seamless process and incredible
                            transformation. Highly recommend!</p>
                        <div class="flex items-center">
                            <img src={{ asset('assets/images/janathan-barkri.png') }} alt="User Image"
                                class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold">Jonathan Barkl</h3>
                                <p class="text-gray-600">Co-Founder and CEO</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more slides as needed -->
                </div>
            </div>
        </div>
    </div>

    <!-- Start Latest Blogs Section -->
    <section class="bg-white py-20">
        <div class="container xl:container-xl px-4">
            <div class="text-center">
                <h2 class="text-3xl font-bold">Latest Blogs For You</h2>
                <p class="text-gray-600 mt-2 pb-14">Embrace the advantages of property listing and become a part of our community
                    today.</p>
            </div>
            <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src={{ asset('assets/images/building.svg') }} alt="News Image 1"
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <span class="block text-blue-500 text-sm mb-2">25-06-2024</span>
                        <h3 class="text-xl font-bold mb-2">Average S. Rental Price Hits a Two-Year High</h3>
                        <p class="text-gray-600 mb-4">Help people get to know you by list your business. Showcase your
                            business with your outstanding media gallery.</p>
                        <a href="#" class="text-orange-500 hover:underline">Read More &rarr;</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src={{ asset('assets/images/static-report.svg') }} alt="News Image 2"
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <span class="block text-blue-500 text-sm mb-2">25-06-2024</span>
                        <h3 class="text-xl font-bold mb-2">Average S. Rental Price Hits a Two-Year High</h3>
                        <p class="text-gray-600 mb-4">Help people get to know you by list your business. Showcase your
                            business with your outstanding media gallery.</p>
                        <a href="#" class="text-orange-500 hover:underline">Read More &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest Blogs Section -->

    @include('partials.footer')
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Top banner carousel Start --}}
    <script>
        function carousel() {
            return {
                currentSlide: 0,
                slides: [
                    { id: 1, text: 'Real Estate', image: '{{ asset('assets/icons/real-state.svg') }}' },
                    { id: 2, text: 'Business Consulting', image: '{{ asset('assets/icons/business.svg') }}' },
                    { id: 3, text: 'Car Washer', image: '{{ asset('assets/icons/car-washer.svg') }}' },
                    { id: 4, text: 'Beauty Salon', image: '{{ asset('assets/icons/beauty-salon.svg') }}' },
                    { id: 5, text: 'Fitness Center', image: '{{ asset('assets/icons/fitness-center.svg') }}' },
                    { id: 6, text: 'Real Estate', image: '{{ asset('assets/icons/real-state.svg') }}' },
                    { id: 7, text: 'Business Consulting', image: '{{ asset('assets/icons/business.svg') }}' },
                    { id: 8, text: 'Car Washer', image: '{{ asset('assets/icons/car-washer.svg') }}' },
                    { id: 9, text: 'Beauty Salon', image: '{{ asset('assets/icons/beauty-salon.svg') }}' },
                    { id: 10, text: 'Fitness Center', image: '{{ asset('assets/icons/fitness-center.svg') }}' },
                        ],
                get slidesToShow() {
                    return window.innerWidth >= 1024 ? 6 : 3;
                },
                get slideClass() {
                    return window.innerWidth >= 1024 ? 'w-1/6' : 'w-1/3';
                },
                prev() {
                    if (this.currentSlide > 0) {
                        this.currentSlide--;
                    } else {
                        this.currentSlide = Math.ceil(this.slides.length / this.slidesToShow) - 1;
                    }
                },
                next() {
                    if (this.currentSlide < Math.ceil(this.slides.length / this.slidesToShow) - 1) {
                        this.currentSlide++;
                    } else {
                        this.currentSlide = 0;
                    }
                },
                updateSlider() {
                    this.currentSlide = 0; // Reset to the first slide on resize
                },
                init() {
                    window.addEventListener('resize', () => {
                        this.updateSlider();
                    });
                }
            }
        }
    </script>

    {{-- Business Ventures carousel --}}
    <script>
        function sliderData() {
                return {
                    currentIndex: 0,
                    hotels: [
                        {
                            name: 'Hotel Arc New York City',
                            location: 'New York, United States',
                            rating: '4.5',
                            reviews: '228',
                            price: '$243.00',
                            image: 'assets/images/hotel.svg',
                        },
                        {
                            name: 'Hotel Arc New York City',
                            location: 'New York, United States',
                            rating: '4.5',
                            reviews: '228',
                            price: '$243.00',
                            image: 'assets/images/hotel.svg',
                        },
                        {
                            name: 'Hotel Arc New York City',
                            location: 'New York, United States',
                            rating: '4.5',
                            reviews: '228',
                            price: '$243.00',
                            image: 'assets/images/hotel.svg',
                        },
                        {
                            name: 'Hotel Arc New York City',
                            location: 'New York, United States',
                            rating: '4.5',
                            reviews: '228',
                            price: '$243.00',
                            image: 'assets/images/hotel.svg',
                        },
                        {
                            name: 'Hotel Arc New York City',
                            location: 'New York, United States',
                            rating: '4.5',
                            reviews: '228',
                            price: '$243.00',
                            image: 'assets/images/hotel.svg',
                        },
                        // Add more hotel objects as needed
                    ],
                    get visibleSlides() {
                        if (window.innerWidth >= 1024) {
                            return 4;
                        } else if (window.innerWidth >= 768) {
                            return 3;
                        } else if (window.innerWidth >= 640) {
                            return 2;
                        } else {
                            return 1;
                        }
                    },
                    prev() {
                        if (this.currentIndex > 0) {
                            this.currentIndex--;
                        }
                    },
                    next() {
                        if (this.currentIndex < Math.ceil(this.hotels.length / this.visibleSlides) - 1) {
                            this.currentIndex++;
                        }
                    },
                    updateSlider() {
                        this.currentIndex = 0; // Reset to the first slide on resize
                    },
                    init() {
                        window.addEventListener('resize', () => {
                            this.updateSlider();
                        });
                    }
                };
            }
        </script>
    



@endpush
