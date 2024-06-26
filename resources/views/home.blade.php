@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
   
    .slider-container {
        overflow: hidden;
    }
    .slider {
        display: flex;
        transition: transform 0.5s ease;
    }
   .bg-banner {
    background: url('/assets/images/bg-banner.svg') no-repeat center center;
    background-size: cover;
    position: relative; 
    height: 445px;
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


.relative-container {
    position: relative;
    padding: 0;
    z-index: 0;
}
    </style>
    
@endpush

@section('content')
<section class="bg-banner">
    <div class=" text-center z-0">
        <!-- Heading Content -->
        <div class="flex flex-col pt-20">
            <h1 class="text-4xl text-white font-bold">Find Your Business</h1>
            <p class="mt-2 text-sm text-gray-300">WE HELP YOU FIND YOUR IDEAL TRANSFER</p>
        </div>

        <!-- Search Area -->
        <div class="container mx-auto mt-8 position-relative">
            <div class="bg-white rounded px-4 py-4 flex flex-wrap justify-start items-start mx-auto w-full md:max-w-max lg:max-w-max">
                <div class="flex-1 min-w-[200px] p-1">
                    <input type="text" placeholder="Search By Keyword" class="w-full p-2 border-2 rounded">
                </div>
                <div class="flex-1 min-w-[200px] p-1">
                    <select class="w-full p-2 border-2 rounded">
                        <option>Operation Type</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px] p-1">
                    <select class="w-full p-2 border-2 rounded">
                        <option>Business Type</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px] p-1">
                    <select class="w-full p-2 border-2 rounded">
                        <option>Location</option>
                    </select>
                </div>
                <div class="flex-1 p-1">
                    <button class="w-full bg-orange-500 text-white p-2 rounded">Find Now</button>
                </div>
            </div>
        </div>
    </div>
        <!-- Slider Section -->
        <div class="slider-container">
            <div class="container-fluid mx-0 px-6 py-10">
                <div class="relative flex items-center">
                    <button id="prevButton" class="absolute left-0 transform -translate-x-1/2 bg-orange-500 text-white rounded-full p-2 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <div id="slider" class="flex space-x-4 overflow-hidden w-full">
                        <div class="bg-white rounded shadow p-6 flex-shrink-0 w-1/6 text-center">
                            <div class="text-orange-500 mx-auto">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h2l2 10h10l2-10h2"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 1 1 1-8 0h8z"></path>
                                </svg>
                            </div>
                            <p class="mt-4">Real Estate</p>
                        </div>
                        <div class="bg-white rounded shadow p-6 flex-shrink-0 w-1/6 text-center">
                            <div class="text-orange-500 mx-auto">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17h-1v-4a4 4 0 1 0-8 0v4H6"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 17a6 6 1 1 1 12 0"></path>
                                </svg>
                            </div>
                            <p class="mt-4">Business Consulting</p>
                        </div>
                        <div class="bg-white rounded shadow p-6 flex-shrink-0 w-1/6 text-center">
                            <div class="text-orange-500 mx-auto">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a1 1 0 0 0-1-1h-4.338a2 2 0 1 0-3.324 0H6a1 1 0 0 0-1 1v6H2l1.08 5.323A2 2 0 0 0 5.045 20h13.91a2 2 0 0 0 1.965-1.677L22 13h-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10V7a5 5 0 0 1 10 0v3"></path>
                                </svg>
                            </div>
                            <p class="mt-4">Car Washer</p>
                        </div>
                        <div class="bg-white rounded shadow p-6 flex-shrink-0 w-1/6 text-center">
                            <div class="text-orange-500 mx-auto">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 12V7a2 2 0 1 1 4 0v5"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7a2 2 0 0 1 4 0"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 21V12a2 2 0 0 1 4 0v9"></path>
                                </svg>
                            </div>
                            <p class="mt-4">Beauty Salon</p>
                        </div>
                        <div class="bg-white rounded shadow p-6 flex-shrink-0 w-1/6 text-center">
                            <div class="text-orange-500 mx-auto">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8"></path>
                                </svg>
                            </div>
                            <p class="mt-4">Real Estate</p>
                        </div>
                        <div class="bg-white rounded shadow p-6 flex-shrink-0 w-1/6 text-center">
                            <div class="text-orange-500 mx-auto">
                                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8"></path>
                                </svg>
                            </div>
                            <p class="mt-4">Business Consulting</p>
                        </div>
                    </div>
                    <button id="nextButton" class="absolute right-0 transform translate-x-1/2 bg-orange-500 text-white rounded-full p-2 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

</section>



    <!-- Product Slider Section -->
    <div class="position-relative  bg-gray-200 pb-10 pt-32">
        <div class="container mx-auto px-4 w-4/5">
            <h2 class="text-2xl font-bold mb-4 text-center">Explore Profitable Business Ventures</h2>
            <p class="text-center mb-6">We Discover Your Business Success</p>
            <div class="relative flex items-center">
                <button id="productPrevButton" class="absolute -left-6 transform -translate-x-1/2 bg-purple-500 text-white rounded-full p-2 z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <div id="productSlider" class="flex space-x-4 overflow-hidden w-full">
                    <!-- Slide Items -->
                    <div class="bg-white rounded shadow p-4 flex-shrink-0 w-64">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="Hotel Arc New York City" class="w-full h-48 object-cover rounded mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold">Hotel Arc New York City</h3>
                            <span class="bg-orange-500 text-white text-sm px-2 py-1 rounded">Sale</span>
                        </div>
                        <p class="text-sm text-gray-600">New York, United States</p>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <span class="text-yellow-500">★ 4.5</span>
                            <span class="ml-1">228 reviews</span>
                        </div>
                        <p class="text-lg font-bold mb-2">$243.00</p>
                        <button class="bg-purple-500 text-white text-sm px-4 py-2 rounded">View</button>
                    </div>
                    <!-- Repeat Slide Item -->
                    <div class="bg-white rounded shadow p-4 flex-shrink-0 w-64">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="Hotel Arc New York City" class="w-full h-48 object-cover rounded mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold">Hotel Arc New York City</h3>
                            <span class="bg-orange-500 text-white text-sm px-2 py-1 rounded">Sale</span>
                        </div>
                        <p class="text-sm text-gray-600">New York, United States</p>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <span class="text-yellow-500">★ 4.5</span>
                            <span class="ml-1">228 reviews</span>
                        </div>
                        <p class="text-lg font-bold mb-2">$243.00</p>
                        <button class="bg-purple-500 text-white text-sm px-4 py-2 rounded">View</button>
                    </div>
                    <!-- Repeat Slide Item -->
                    <div class="bg-white rounded shadow p-4 flex-shrink-0 w-64">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="Hotel Arc New York City" class="w-full h-48 object-cover rounded mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold">Hotel Arc New York City</h3>
                            <span class="bg-orange-500 text-white text-sm px-2 py-1 rounded">Sale</span>
                        </div>
                        <p class="text-sm text-gray-600">New York, United States</p>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <span class="text-yellow-500">★ 4.5</span>
                            <span class="ml-1">228 reviews</span>
                        </div>
                        <p class="text-lg font-bold mb-2">$243.00</p>
                        <button class="bg-purple-500 text-white text-sm px-4 py-2 rounded">View</button>
                    </div>
                    <!-- Repeat Slide Item -->
                    <div class="bg-white rounded shadow p-4 flex-shrink-0 w-64">
                        <img src="{{ asset('/assets/images/logo.png') }}" alt="Hotel Arc New York City" class="w-full h-48 object-cover rounded mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold">Hotel Arc New York City</h3>
                            <span class="bg-orange-500 text-white text-sm px-2 py-1 rounded">Sale</span>
                        </div>
                        <p class="text-sm text-gray-600">New York, United States</p>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <span class="text-yellow-500">★ 4.5</span>
                            <span class="ml-1">228 reviews</span>
                        </div>
                        <p class="text-lg font-bold mb-2">$243.00</p>
                        <button class="bg-purple-500 text-white text-sm px-4 py-2 rounded">View</button>
                    </div>
                </div>
                <button id="productNextButton" class="absolute -right-6 transform translate-x-1/2 bg-purple-500 text-white rounded-full p-2 z-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Side by Side Section -->
    <div class="container mx-auto px-4 py-10 w-4/5">
        <div class="bg-gray-200 rounded-lg overflow-hidden shadow-lg flex h-64">
            <!-- Image Part -->
            <div class="w-2/5">
                <img src="{{ asset('/assets/images/18516.png') }}" alt="Business Image" class="w-full h-full object-cover">
            </div>
            <!-- Text Part -->
            <div class="w-3/5 bg-purple-900 text-white p-10 flex flex-col justify-center">
                <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo" class="h-12 w-12 mb-4">
                <h2 class="text-2xl font-bold mb-4">We Don’t Just Find Premises, We Discover Your Business Success</h2>
                <button class="bg-orange-500 text-sm font-poppins text-white text-left inline-block min-w-[70px]  px-4 py-4 rounded">Find Now</button>
            </div>
        </div>
    </div>
    <!-- Section with Images and Text -->
    <div class="container mx-auto p-4 w-4/5 bg-white">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- Main image on the left -->
            <div class="col-span-1 pr-32 relative">
                <img src="{{ asset('/assets/images/18516.png') }}" alt="Main Image" class="w-full h-96 object-cover rounded-lg">
                <img src="{{ asset('/assets/images/18516.png') }}" alt="Small Image 1" class="w-44 h-64 object-cover rounded-lg absolute -right-6 -bottom-6">
            </div>
            <!-- Text and smaller images on the right -->
            <div class="col-span-1 flex flex-col justify-center">
                <div>
                    <h2 class="text-5xl font-bold text-orange-500">5 STARS</h2>
                    <h3 class="text-2xl font-semibold mt-4">Your Dream Business, Our Commitment to Find</h3>
                    <p class="mt-4 text-lg">
                        We go beyond simply locating premises. We are dedicated to uncovering and securing the perfect business opportunities tailored to your needs. Our expertise and commitment ensure that your path to business success is clear and achievable. Let us help you find not just a place, but the ideal environment where your business can thrive.
                    </p>
                    <button class="mt-6 px-6 py-3 bg-purple-700 text-white rounded">Join Us Now</button>
                </div>
                <!-- Two smaller images below -->
                <div class="grid grid-cols-2 gap-4 mt-4">                    
                    <img src="{{ asset('/assets/images/18516.png') }}" alt="Small Image 2" class="w-full h-32 object-cover rounded-lg float-end">
                </div>
            </div>
        </div>
    </div>
    <!-- Top Business section below -->
    <div class="container mx-auto">
        <!-- Header Section -->
        <div class="text-center bg-purple-800 py-6">
            <h2 class="text-2xl font-bold text-white">Explore Top Business</h2>
            <p class="text-white">Your Dream Business, Our Commitment to Find</p>
            <button class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-md">View All Business</button>
        </div>

        <!-- Business Categories Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
            <div class="relative">
                <img src="{{ asset('/assets/images/business1.jpg') }}" alt="Real Estate" class="w-full h-416 object-cover rounded-lg">
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <a href="#" class="px-4 py-2 bg-white text-black rounded-lg shadow-lg">Real Estate &rarr;</a>
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset('/assets/images/business2.jpg') }}" alt="Business Consulting" class="w-full h-416 object-cover rounded-lg">
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <a href="#" class="px-4 py-2 bg-white text-black rounded-lg shadow-lg">Business Consulting &rarr;</a>
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset('/assets/images/business3.jpg') }}" alt="Car Washer" class="w-full h-416 object-cover rounded-lg">
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <a href="#" class="px-4 py-2 bg-white text-black rounded-lg shadow-lg">Car Washer &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Easy Steps to Join Section -->
        <div class="text-center mt-16">
            <h2 class="text-3xl font-bold">Easy Steps to Join Us!</h2>
            <p class="text-gray-600 mt-2">Embrace the advantages of property listing and become a part of our community today.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
            <div class="flex flex-col items-center">
                <img src="{{ asset('/assets/icons/registration.png') }}" alt="Easy Registration" class="w-10 h-10 mb-2">
                <h3 class="text-xl font-semibold">Easy Registration</h3>
                <p class="text-center text-gray-600 mt-2">Help people get to know you by listing your business. Showcase your business with your outstanding media gallery.</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('/assets/icons/listing.png') }}" alt="Promote Property Listing" class="w-10 h-10 mb-2">
                <h3 class="text-xl font-semibold">Promote Property Listing</h3>
                <p class="text-center text-gray-600 mt-2">Become more prominent by featuring your listing at the top of search results. This will help you get found with ease.</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('/assets/icons/map.png') }}" alt="Get on the Map" class="w-10 h-10 mb-2">
                <h3 class="text-xl font-semibold">Get on the Map</h3>
                <p class="text-center text-gray-600 mt-2">We will research on the map so your customers can easily find you.</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('/assets/icons/sales.png') }}" alt="Great Sales Benefits" class="w-10 h-10 mb-2">
                <h3 class="text-xl font-semibold">Great Sales Benefits</h3>
                <p class="text-center text-gray-600 mt-2">We will study the market so that you get the best sales by choosing you as our featured.</p>
            </div>
        </div>

         <!-- Find Best Places Section -->
         <div class="relative mt-16">
            <img src="{{ asset('/assets/images/city.jpg') }}" alt="City" class="w-full h-96 object-cover rounded-lg">
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-white">
                <h2 class="text-3xl font-bold">Find Best Places in Your City</h2>
                <p class="mt-2">We Help You Turn Your Ideas Into Reality</p>
                <button class="mt-4 bg-orange-500 px-4 py-2 rounded-md">Know More</button>
            </div>
        </div>
        <!-- Success Stories Section -->
        <div class=" bg-violet-950 text-white flex items-center justify-center min-h-screen">
            <div class=" container w-auto px-10 py-16">
                <div class="text-center mb-20">
                    <h2 class="text-3xl font-bold mb-4">Our Clients' Success Stories</h2>
                    <p class="text-gray-200">Discover the experiences of those who have achieved success with us</p>
                </div>
                <div class="relative -top-20">
                    <div class="absolute right-0 p-6">
                        <button id="prev" class="bg-violet-950 text-gray-400 border-2 border-gray-400 px-2 py-2 rounded ">
                            &larr;
                        </button>
                        <button id="next" class="bg-violet-950 text-gray-400 border-2 border-gray-400 px-2 py-2 rounded ">
                            &rarr;
                        </button>
                    </div>
                </div>
                <div class="relative slider-container">
                    
                    <div id="slider" class="slider space-x-8">
                        <!-- Slide 1 -->
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 flex-shrink-0">
                            <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication ensured outstanding results. We're thrilled with the seamless process and incredible transformation. Highly recommend!</p>
                            <div class="flex items-center">
                                <img src={{asset('assets/images/janathan-barkri.png')}} alt="User Image" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <h3 class="font-semibold">Jonathan Barkl</h3>
                                    <p class="text-gray-600">Co-Founder and CEO</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 flex-shrink-0">
                            <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication ensured outstanding results. We're thrilled with the seamless process and incredible transformation. Highly recommend!</p>
                            <div class="flex items-center">
                                <img src={{asset('assets/images/janathan-barkri.png')}} alt="User Image" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <h3 class="font-semibold">Jonathan Barkl</h3>
                                    <p class="text-gray-600">Co-Founder and CEO</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 flex-shrink-0">
                            <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication ensured outstanding results. We're thrilled with the seamless process and incredible transformation. Highly recommend!</p>
                            <div class="flex items-center">
                                <img src={{asset('assets/images/janathan-barkri.png')}} alt="User Image" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <h3 class="font-semibold">Jonathan Barkl</h3>
                                    <p class="text-gray-600">Co-Founder and CEO</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 flex-shrink-0">
                            <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication ensured outstanding results. We're thrilled with the seamless process and incredible transformation. Highly recommend!</p>
                            <div class="flex items-center">
                                <img src={{asset('assets/images/janathan-barkri.png')}} alt="User Image" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <h3 class="font-semibold">Jonathan Barkl</h3>
                                    <p class="text-gray-600">Co-Founder and CEO</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 flex-shrink-0">
                            <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication ensured outstanding results. We're thrilled with the seamless process and incredible transformation. Highly recommend!</p>
                            <div class="flex items-center">
                                <img src={{asset('assets/images/janathan-barkri.png')}} alt="User Image" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <h3 class="font-semibold">Jonathan Barkl</h3>
                                    <p class="text-gray-600">Co-Founder and CEO</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 flex-shrink-0">
                            <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication ensured outstanding results. We're thrilled with the seamless process and incredible transformation. Highly recommend!</p>
                            <div class="flex items-center">
                                <img src={{asset('assets/images/janathan-barkri.png')}} alt="User Image" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <h3 class="font-semibold">Jonathan Barkl</h3>
                                    <p class="text-gray-600">Co-Founder and CEO</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 flex-shrink-0">
                            <p class="mb-4">Choosing was an excellent decision! Their team's professionalism and dedication ensured outstanding results. We're thrilled with the seamless process and incredible transformation. Highly recommend!</p>
                            <div class="flex items-center">
                                <img src={{asset('assets/images/janathan-barkri.png')}} alt="User Image" class="w-10 h-10 rounded-full mr-3">
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

        <!-- Latest Blogs Section -->
        <div class="text-center mt-16">
            <h2 class="text-3xl font-bold">Latest Blogs For You</h2>
            <p class="text-gray-600 mt-2">Embrace the advantages of property listing and become a part of our community today.</p>
        </div>
        <div class="container justify-center items-center grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
            <div class="relative ">
                <img src="{{ asset('/assets/images/blog1.jpg') }}" alt="Blog 1" class="w-full h-64 object-cover rounded-lg">
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white bg-opacity-75 px-4 py-2 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold">Blog Title 1</h3>
                    <p class="text-gray-600">Short description of the blog.</p>
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset('/assets/images/blog2.jpg') }}" alt="Blog 2" class="w-full h-64 object-cover rounded-lg">
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white bg-opacity-75 px-4 py-2 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold">Blog Title 2</h3>
                    <p class="text-gray-600">Short description of the blog.</p>
                </div>
            </div>
        </div>
    </div>


    @include('partials.footer')
@endsection

@push('scripts')
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.getElementById('slider');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');

            let scrollAmount = 0;
            let scrollStep = slider.clientWidth / 5; // Adjust to the number of items displayed

            prevButton.addEventListener('click', () => {
                slider.scrollBy({
                    left: -scrollStep,
                    behavior: 'smooth'
                });
            });

            nextButton.addEventListener('click', () => {
                slider.scrollBy({
                    left: scrollStep,
                    behavior: 'smooth'
                });
            });

            const productSlider = document.getElementById('productSlider');
            const productPrevButton = document.getElementById('productPrevButton');
            const productNextButton = document.getElementById('productNextButton');

            scrollStep = productSlider.clientWidth / 4; // Adjust to the number of items displayed

            productPrevButton.addEventListener('click', () => {
                productSlider.scrollBy({
                    left: -scrollStep,
                    behavior: 'smooth'
                });
            });

            productNextButton.addEventListener('click', () => {
                productSlider.scrollBy({
                    left: scrollStep,
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endpush
