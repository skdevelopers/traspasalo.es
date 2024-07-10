@extends('front.layouts.app')

@section('title', 'Simple & flexible pricing')
@section('header-title', 'Simple & flexible pricing')
@section('header-subtitle', '')


@section('content')
    @include('front.partials.banner')

    <div class="flex items-center justify-center min-h-screen bg-white">
        <div class="w-full max-w-6xl mx-auto p-20">
            <!-- Tab Switcher -->
            <div class="text-center mb-8">
                <div class="inline-block bg-gray-200 rounded-full p-1">
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-full focus:outline-none">Monthly</button>
                    <button class="px-4 py-2 text-gray-600 rounded-full focus:outline-none">Yearly</button>
                </div>
            </div>
    
            <!-- Pricing Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Free Account -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-left border-2">
                    <h3 class="text-xl font-bold mb-4">Free Account</h3>
                    <p class="text-gray-600 mb-6">The essentials to get you and your team up and running</p>
                    <div class=" p-2 align-super text-superscript text-xl text-gray-600 font-bold">$<span class="text-5xl">00</span><span class="align-super text-superscript text-gray-600 text-sm"> per month</span></div>
                    <button class="bg-white text-gray-600 py-2 px-12 rounded-lg mb-6 border-2" disabled>You are here</button>
                    <div class="text-left">
                        <h1 class="text-md font-semibold">All plan Include:</h1>
                        <ul class="space-y-2 pt-2">
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Post 1 Business</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Contact Details (2 euro)</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Search Alerts</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Highlight Ads (5 euro)</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Get More Eyes</li>
                        </ul>
                    </div>
                </div>


                <div class="bg-white p-8 rounded-lg shadow-lg text-left border-2">
                    <h3 class="text-xl font-bold mb-4">Silver Account</h3>
                    <p class="text-gray-600 mb-6">The essentials to get you and your team up and running</p>
                    <div class=" p-2 align-super text-superscript text-xl text-violet-950 font-bold">$<span class="text-5xl">10</span><span class="align-super text-superscript text-gray-600 text-sm"> per month</span></div>
                    <button class="bg-violet-950 text-white py-2 px-14 rounded-lg mb-6 border-2" disabled>Buy Now</button>
                    <div class="text-left">
                        <h1 class="text-md font-semibold">All plan Include:</h1>
                        <ul class="space-y-2 pt-2">
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Post 1 Business</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Contact Details (2 euro)</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Search Alerts</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Highlight Ads (5 euro)</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Get More Eyes</li>
                        </ul>
                    </div>
                </div>
                

                <div class="bg-white p-8 rounded-lg shadow-lg text-left border-2">
                    <h3 class="text-xl font-bold mb-4">Pro Account</h3>
                    <p class="text-gray-600 mb-6">The essentials to get you and your team up and running</p>
                    <div class=" p-2 align-super text-superscript text-xl text-orange-500 font-bold">$<span class="text-5xl">10</span><span class="align-super text-superscript text-gray-600 text-sm"> per month</span></div>
                    <button class="text-white bg-orange-500 py-2 px-14 rounded-lg mb-6 border-2" disabled>Buy Now</button>
                    <div class="text-left">
                        <h1 class="text-md font-semibold">All plan Include:</h1>
                        <ul class="space-y-2 pt-2">
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Post 1 Business</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Contact Details (2 euro)</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Search Alerts</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Highlight Ads (5 euro)</li>
                            <li class="flex items-center"><span class="text-black mr-2">✔</span>Get More Eyes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="flex-col items-center justify-center flex px-20 py-10">
            <div class="text-center mb-12 w-2/3">
                <h2 class="text-3xl font-bold mb-4">What We Offers</h2>
                <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit. Nullam et maximus lorem. Suspendisse maximus dolor quis consequat volutpat.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4">
                        <img src="{{ asset('front/assets/icons/low-rate.png') }}" alt="Low Rates" class="mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Low Rates</h3>
                    <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4">
                        <img src="{{ asset('front/assets/icons/booking-reservation-icon.png') }}" alt="No Reservation Fees" class="mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">No Reservation Fees</h3>
                    <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4">
                        <img src="{{ asset('front/assets/icons/secure-booking.png') }}" alt="Secure Booking" class="mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Secure Booking</h3>
                    <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4">
                        <img src="{{ asset('front/assets/icons/24-hours-phone-support-icon.png') }}" alt="24/7 Support" class="mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.</p>
                </div>
            </div>
        </div>
    </div>
    

    @include('front.partials.footer')
@endsection