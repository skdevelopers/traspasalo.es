@extends('layouts.app')

@section('title', 'About US')
@section('header-title', 'About Us')
@section('header-subtitle', '')

@push('styles')
<style>
    .slider-container {
        overflow: hidden;
    }
    .slider {
        display: flex;
        transition: transform 0.5s ease;
    }
</style>
@endpush

@section('content')
    @include('partials.banner')

    <div class="bg-gray-100 min-h-screen max-w-full">
        <div class="flex md:flex-row bg-white p-20  items-center">
            <!-- Text Section -->
            <div class="px-10 py-10 max-w-2xl">
                <h1 class="text-2xl font-bold mb-6">Find The Best Accommodation</h1>
                <p class="mb-4">
                    Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit. Nullam et maximus lorem. Suspendisse maximus dolor quis consequat volutpat. Donec vehicula elit eu erat pulvinar, vel congue ex egestas. Praesent egestas purus dui, a porta arcu pharetra quis. Sed vestibulum semper ligula, id accumsan orci ornare ut. Donec id pharetra nunc, sit amet sollicitudin mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam dapibus nisl at diam scelerisque luctus. Nam mattis, velit in malesuada maximus, erat ligula eleifend eros, et lacinia nunc ante vel odio.
                </p>
                <p>
                    Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit. Nullam et maximus lorem. Suspendisse maximus dolor quis consequat volutpat. Donec vehicula elit eu erat pulvinar, vel congue ex egestas. Praesent egestas purus dui, a porta arcu pharetra quis. Sed vestibulum semper ligula, id accumsan orci ornare ut. Donec id pharetra nunc, sit amet sollicitudin mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam dapibus nisl at diam scelerisque luctus. Nam mattis, velit in malesuada maximus, erat ligula eleifend eros, et lacinia nunc ante vel odio.
                </p>
            </div>
    
            <!-- Image Section -->
            <div class="relative w-full max-w-lg mx-auto p-20">
                <div class="absolute top-0 right-8 w-[200px] h-[200px] bg-pink-100 rounded-lg"></div>
                <div class="relative z-10">
                    <img src="{{ asset('assets/images/mirror-room.svg') }}" alt="Main Image" class="w-[580px] rounded-lg">
                </div>
                <div class="absolute bottom-5 left-15 transform translate-y-1/4 -translate-x-1/4 z-10">
                    <img src="{{ asset('assets/images/bed-room.svg') }}" alt="Small Image" class="w-[200px] rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </div>

   {{-- we offer  --}}
   <div class="container ">
    <div class="flex-col items-center justify-center flex px-20 py-10">
        <div class="text-center mb-12 w-2/3">
            <h2 class="text-3xl font-bold mb-4">What We Offers</h2>
            <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit. Nullam et maximus lorem. Suspendisse maximus dolor quis consequat volutpat.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="mb-4">
                    <img src="{{ asset('assets/icons/low-rate.png') }}" alt="Low Rates" class="mx-auto">
                </div>
                <h3 class="text-xl font-semibold mb-2">Low Rates</h3>
                <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="mb-4">
                    <img src="{{ asset('assets/icons/booking-reservation-icon.png') }}" alt="No Reservation Fees" class="mx-auto">
                </div>
                <h3 class="text-xl font-semibold mb-2">No Reservation Fees</h3>
                <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="mb-4">
                    <img src="{{ asset('assets/icons/secure-booking.png') }}" alt="Secure Booking" class="mx-auto">
                </div>
                <h3 class="text-xl font-semibold mb-2">Secure Booking</h3>
                <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="mb-4">
                    <img src="{{ asset('assets/icons/24-hours-phone-support-icon.png') }}" alt="24/7 Support" class="mx-auto">
                </div>
                <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.</p>
            </div>
        </div>
    </div>
</div>

{{-- silder for clients --}}
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

<!-- Frequently Asked Questions -->
<section class=" text-black py-24 min-h-screen">
    <div class="container flex flex-col justify-center mx-auto">
      <h2 class=" text-xl font-bold leadi text-center sm:text-xl">Frequently Asked Questions</h2>
      <h2 class="mb-12 text-sm  text-center sm:text-sm">Discover the experiences of those who have achieved success with us</h2>
      <div class="flex flex-col divide-y sm:px-8 lg:px-12 xl:px-32 divide-gray-700">
        <ul class="basis-1/2">
            <li>
                <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false"  onclick="toggleFAQ(this)">
                    <span class="flex-1 text-base-content">How secure is my insurance information?</span>
                    <svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z" stroke="black" stroke-width="1.5"/>
                        <path d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z" fill="black"/>
                    </svg>
                </button>
                <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                    <div class="pb-5 leading-relaxed">
                        <div class="space-y-2 leading-relaxed">We prioritize the security of your insurance information. We use advanced encryption and strict data protection measures to ensure your data is safe and confidential.</div>
                    </div>
                </div>
            </li>
            <li>
                <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                    <span class="flex-1 text-base-content">How can I customize my insurance coverage?</span>
                    <svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z" stroke="black" stroke-width="1.5"/>
                        <path d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z" fill="black"/>
                    </svg>
                </button>
                <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                    <div class="pb-5 leading-relaxed">
                        <div class="space-y-2 leading-relaxed">Our insurance plans are customizable. You can tailor your coverage to meet your specific needs and budget.</div>
                    </div>
                </div>
            </li>
            <li>
                <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                    <span class="flex-1 text-base-content">Is there a waiting period for insurance claims?</span>
                    <svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z" stroke="black" stroke-width="1.5"/>
                        <path d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z" fill="black"/>
                    </svg>
                </button>
                <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                    <div class="pb-5 leading-relaxed">
                        <div class="space-y-2 leading-relaxed">There may be a waiting period for certain insurance claims, depending on the policy terms and conditions. Please refer to your policy documents for details.</div>
                    </div>
                </div>
            </li>
            <li>
                <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                    <span class="flex-1 text-base-content">Is there a waiting period for insurance claims?</span>
                    <svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z" stroke="black" stroke-width="1.5"/>
                        <path d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z" fill="black"/>
                    </svg>
                </button>
                <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                    <div class="pb-5 leading-relaxed">
                        <div class="space-y-2 leading-relaxed">There may be a waiting period for certain insurance claims, depending on the policy terms and conditions. Please refer to your policy documents for details.</div>
                    </div>
                </div>
            </li>
            <li>
                <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                    <span class="flex-1 text-base-content">Is there a waiting period for insurance claims?</span>
                    <svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z" stroke="black" stroke-width="1.5"/>
                        <path d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z" fill="black"/>
                    </svg>
                </button>
                <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                    <div class="pb-5 leading-relaxed">
                        <div class="space-y-2 leading-relaxed">There may be a waiting period for certain insurance claims, depending on the policy terms and conditions. Please refer to your policy documents for details.</div>
                    </div>
                </div>
            </li>
        </ul>
      </div>
    </div>
  </section>


    @include('partials.footer')
@endsection

@push('scripts')
<script>
    const slider = document.getElementById('slider');
    const nextButton = document.getElementById('next');
    const prevButton = document.getElementById('prev');

    let currentIndex = 0;

    nextButton.addEventListener('click', () => {
        if (currentIndex < slider.children.length - 1) {
            currentIndex++;
            slider.style.transform = `translateX(-${currentIndex * (100 / slider.children.length)}%)`;
        }
    });

    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            slider.style.transform = `translateX(-${currentIndex * (100 / slider.children.length)}%)`;
        }
    });

    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
        content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
    }
</script>

    
@endpush
