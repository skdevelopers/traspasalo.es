@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!--image grid------->
    <div class="container-fluid mx-auto p-0">
        <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-6 gap-2">
            <!-- Large Image (takes 2 columns on large screens) -->
            <div class="relative lg:col-span-3">
                <img src="assets/images/home-house-exterior-design-showing-tropical-pool-villa-with-sun-bed.jpg" alt="Image 1" class="w-full h-full object-cover">
            </div>

            <!-- Small Images -->
            <div class="relative lg:col-span-3">
                <img src="assets/images/home-house-exterior-design-showing-tropical-pool.jpg" alt="Image 3" class="w-full h-full object-cover">
            </div>
            <div class="relative lg:col-span-2">
                <img src="assets/images/home-house-exterior-design-showing-tropical-pool-villa-with-sun-bed.jpg" alt="Image 4" class="w-full h-full object-cover">
            </div>
            <div class="relative lg:col-span-2">
                <img src="assets/images/home-house-exterior-design-showing-tropical-pool-villa.jpg" alt="Image 5" class="w-full h-full object-cover">
            </div>
            <!-- More Images Overlay -->
            <div class="relative lg:col-span-2">
                <img src="assets/images/home-house-exterior.jpg" alt="Image 6" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <span class="text-white text-2xl">+6</span>
                </div>
            </div>
        </div>
    </div>


    <!---description and host contact--->
    <div class="container mx-auto p-4">
        <!-- Header Section -->
        <div class="bg-white p-6  flex flex-row md:justify-between">

            <div class="flex-col">
                <h1 class="text-3xl font-bold mb-2">Paris Standard Deluxe</h1>
                <div class="flex items-center mb-4">
                    <span class="text-yellow-500 text-xl mr-2">★</span>
                    <span class="text-gray-700 text-lg">4.5</span>
                    <span class="text-gray-500 ml-2">(228 reviews)</span>
                </div>
                <div class="flex items-start mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 8 8" class="mr-2">
                        <path fill="#270B79"
                              d="M4 0C2.34 0 1 1.34 1 3c0 2 3 5 3 5s3-3 3-5c0-1.66-1.34-3-3-3m0 1a2 2 0 0 1 2 2c0 1.11-.89 2-2 2a2 2 0 1 1 0-4" />
                    </svg>
                    <span class="text-gray-700">Francisco Román Alarcón, 1060 W Addison St #13, Chicago, IL 60613</span>
                    <span class="text-red-500 ml-1 underline underline-offset-4 md:text-sm text-xs">Show On Map</span>
                </div>
                <div class="text-xl text-gray-800 font-semibold mb-4">From $243.00</div>
            </div>

            <div class="">
                <div class="flex space-x-4 mb-4">
                    <button class="rounded-full border-2 border-gray-300 p-2">
                        <svg class="w-6 h-6 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                    d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z" />
                        </svg>
                    </button>
                    <button class="rounded-full border-2 border-gray-300 p-2">
                        <svg class="w-6 h-6 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="#270B79"
                                  d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.03-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.03.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L7.96 9.81c-.54-.5-1.25-.81-2.03-.81-1.66 0-3 1.34-3 3s1.34 3 3 3c.78 0 1.49-.31 2.03-.81l7.13 4.17c-.05.21-.08.44-.08.67 0 1.66 1.34 3 3 3s3-1.34 3-3-1.34-3-3-3z" />
                        </svg>
                    </button>
                </div>
                <div>
                    <button class="bg-purple-950 text-white text-xs md:text-sm px-4 py-2 rounded-md flex">
                        <svg class="w-4 md:h-4 h-3 fill-current mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 18"
                             aria-hidden="true">
                            <path fill="currentColor"
                                  d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                        </svg>
                        Host Contact
                    </button>
                </div>
            </div>

        </div>

        <hr class="border-t border-gray-300 my-4">

        <!-- Description Section -->
        <div class="bg-white mt-6 p-6 rounded-lg shadow-lg">
            <p class="text-gray-700 mb-4">
                Welcome to our hotel! We are pleased to offer a variety of rooms that are designed to provide a
                comfortable and relaxing stay for our guests. Whether you are traveling for business or leisure, we have
                the perfect room to meet your needs.
            </p>
            <p class="text-gray-700 mb-4">
                Our standard rooms are spacious and well-appointed, with comfortable beds, plush pillows, and luxurious
                linens to ensure a good night's sleep. The rooms also come equipped with modern amenities such as
                flat-screen TVs, mini-fridges, and high-speed internet access to keep you connected during your stay.
                Each room has a private bathroom with fresh towels, complimentary toiletries, and hairdryers for your
                convenience.
            </p>
            <p class="text-gray-700 mb-4">
                The rooms also come equipped with modern amenities such as flat-screen TVs, mini-fridges, and high-speed
                internet access to keep you connected during your stay. Each room has a private bathroom with fresh
                towels, complimentary toiletries, and hairdryers for your convenience.
            </p>
            <p class="text-gray-700 mb-4">
                Welcome to our hotel! We are pleased to offer a variety of rooms that are designed to provide a
                comfortable and relaxing stay for our guests. Whether you are traveling for business or leisure, we have
                the perfect room to meet your needs.
            </p>
            <p class="text-gray-700 mb-4">
                Our standard rooms are spacious and well-appointed, with comfortable beds, plush pillows, and luxurious
                linens to ensure a good night's sleep. The rooms also come equipped with modern amenities such as
                flat-screen TVs, mini-fridges, and high-speed internet access to keep you connected during your stay.
                Each room has a private bathroom with fresh towels, complimentary toiletries, and hairdryers for your
                convenience.
            </p>
            <p class="text-gray-700 mb-4">
                The rooms also come equipped with modern amenities such as flat-screen TVs, mini-fridges, and high-speed
                internet access to keep you connected during your stay. Each room has a private bathroom with fresh
                towels, complimentary toiletries, and hairdryers for your convenience.
            </p>
        </div>

    </div>


    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-2">Best Featured Amenities</h2>
            <p class="text-center text-gray-600 mb-8">All premium useful features are included in this service</p>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/key.svg') }}" alt="Accessibility" class="mx-auto mb-4">
                    <p class="text-gray-800">Accessibility</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/hot-water.svg') }}" alt="Hot water" class="mx-auto mb-4">
                    <p class="text-gray-800">Hot water</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/air-conditioning.svg') }}" alt="Air-conditioning" class="mx-auto mb-4">
                    <p class="text-gray-800">Air-conditioning</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/store.svg') }}" alt="Store" class="mx-auto mb-4">
                    <p class="text-gray-800">Store</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Heating" class="mx-auto mb-4">
                    <p class="text-gray-800">Heating</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Fully equipped" class="mx-auto mb-4">
                    <p class="text-gray-800">Fully equipped</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Kitchen" class="mx-auto mb-4">
                    <p class="text-gray-800">Kitchen</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Working" class="mx-auto mb-4">
                    <p class="text-gray-800">Working</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Abroad" class="mx-auto mb-4">
                    <p class="text-gray-800">Abroad</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Corner" class="mx-auto mb-4">
                    <p class="text-gray-800">Corner</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="License" class="mx-auto mb-4">
                    <p class="text-gray-800">License</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Security door" class="mx-auto mb-4">
                    <p class="text-gray-800">Security door</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Security door" class="mx-auto mb-4">
                    <p class="text-gray-800">Security door</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Security door" class="mx-auto mb-4">
                    <p class="text-gray-800">Security door</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Security door" class="mx-auto mb-4">
                    <p class="text-gray-800">Security door</p>
                </div>
                <div class="p-6 bg-white shadow rounded-lg text-center">
                    <img src="{{ asset('assets/images/wine.svg') }}" alt="Security door" class="mx-auto mb-4">
                    <p class="text-gray-800">Security door</p>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
@push('scripts')

@endpush
