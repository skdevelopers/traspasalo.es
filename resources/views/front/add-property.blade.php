@extends('front.layouts.app')

@section('title', 'Business')
@section('header-title', 'Business')
@section('header-subtitle', '')

@push('styles')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
@endpush
@push('styles')
    <style>
        .custom-grid-5 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 1rem;
        }

        .custom-grid-5>div:nth-child(1),
        .custom-grid-5>div:nth-child(2) {
            grid-column: span 2;
        }

        .custom-grid-5>div:nth-child(3),
        .custom-grid-5>div:nth-child(4),
        .custom-grid-5>div:nth-child(5) {
            /* grid-column: span 1; */
            grid-row: 2;
        }
    </style>
@endpush

@section('content')

    <!--image grid-->
    <!-- Image Grid -->
    <div class="container-fluid mx-auto p-0">
        <div class="container mx-auto p-4" x-data="gallery()" x-init="initializeImages()">
            <!-- Grid layout -->
            <div :class="gridClass">
                <template x-for="(image, index) in visibleImages" :key="index">
                    <div class="relative bg-gray-300 cursor-pointer" @click="openModal(index)">
                        <img :src="image.src" :alt="image.alt" class="w-full"
                            :class="{
                                'blur-md': index === 3 && images.length > 4,
                                'opacity-50': index === 3 && images.length >
                                    4
                            }">
                        <span x-show="index === 3 && images.length > 4"
                            class="absolute inset-0 flex items-center justify-center text-white text-2xl font-bold">4+</span>
                    </div>
                </template>
            </div>

            <!-- Modal -->
            <div x-show="isModalOpen" @click.away="isModalOpen = false"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-4 rounded-lg w-full md:w-3/4 relative">
                    <button @click="isModalOpen = false" class="absolute top-0 right-0 m-2 text-black">X</button>
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-500"
                            :style="'transform: translateX(-' + modalIndex * 100 + '%)'">
                            <template x-for="(image, index) in images" :key="index">
                                <div class="min-w-full flex justify-center">
                                    <img :src="image.src" :alt="image.alt" class="modal-image">
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <button @click="prev" class="bg-gray-800 text-white px-4 py-2 rounded">Previous</button>
                        <button @click="next" class="bg-gray-800 text-white px-4 py-2 rounded">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--description and host contact-->
    <div class="bg-white">
        <div class="container xl:container-xl px-4">
            <!-- Header Section -->
            <div class="bg-white py-6 flex flex-col md:flex-row md:justify-between items-start md:items-center">
                <div class="flex-col">
                    <h1 class="text-3xl font-bold mb-2">{{ $business['business_title'] }}</h1>
                    <div class="flex items-center mb-4">
                        <span class="text-yellow-500 text-xl mr-2">★</span>
                        <span class="text-gray-700 text-lg">4.5</span>
                        <span class="text-gray-500 ml-2">(228 reviews)</span>
                    </div>
                    <div class="flex items-start mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 8 8"
                            class="mr-2">
                            <path fill="#270B79"
                                d="M4 0C2.34 0 1 1.34 1 3c0 2 3 5 3 5s3-3 3-5c0-1.66-1.34-3-3-3m0 1a2 2 0 0 1 2 2c0 1.11-.89 2-2 2a2 2 0 1 1 0-4" />
                        </svg>
                        <span class="text-gray-700">{{ $business['location'] }}</span>
                        <!-- Trigger Button -->
                        <div x-data="mapModal('{{ $business['location'] }}')" x-init="init">
                            <span class="text-red-500 ml-1 underline underline-offset-4 md:text-sm text-xs cursor-pointer" @click="open = true">Show On Map</span>
                        
                            <!-- Modal -->
                            <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
                                <div class="fixed inset-0 bg-black bg-opacity-50"></div>
                                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                                    <div class="p-4">
                                        <div id="map" class="h-64 w-full"></div>
                                    </div>
                                    <div class="p-4 flex justify-end">
                                        <button @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
    
                    </div>
                    <div class="text-xl text-gray-800 font-semibold mb-4">From $243.00</div>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="flex space-x-4 mb-4">
                        <button class="rounded-full border-2 border-gray-300 p-2">
                            <svg class="w-6 h-6 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path
                                    d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z" />
                            </svg>
                        </button>
                        <button class="rounded-full border-2 border-gray-300 p-2">
                            <svg class="w-6 h-6 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path fill="#270B79"
                                    d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.03-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.03.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L7.96 9.81c-.54-.5-1.25-.81-2.03-.81-1.66 0-3 1.34-3 3s1.34 3 3 3c.78 0 1.49-.31 2.03-.81l7.13 4.17c-.05.21-.08.44-.08.67 0 1.66 1.34 3 3 3s3-1.34 3-3-1.34-3-3-3z" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <button class="bg-purple-950 text-white text-xs md:text-sm px-4 py-2 rounded-md flex items-center">
                            <svg class="w-4 md:h-4 h-3 fill-current mr-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 19 18" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                            </svg>
                            <a href="tel:{{ $business['user']->mobile_number }}">Host Contact</a>
                        </button>
                    </div>
                </div>
            </div>

            <hr class="border-t border-gray-300 my-4">

            <!-- Description Section -->
            <div class="bg-white p-6 rounded-lg">
                {{ $business['description'] }}
            </div>
        </div>
    </div>

    <section class="py-12 md:px-48">

        <div class="container mx-auto px-4" x-data="featureDisplay()" x-init="fetchFeatures">
            <h2 class="text-2xl font-bold text-center mb-2">Best Featured Amenities</h2>
            <p class="text-center text-gray-600 mb-8">All premium useful features are included in this service</p>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                <template x-for="feature in matchedFeatures" :key="feature.feature">
                    <div class="text-center bg-white w-full border border-gray-300 p-4 rounded-lg">
                        <div class="flex justify-center items-center h-12 w-12 bg-gray-100 rounded-full mb-2 mx-auto">
                            <span class="material-icons-round" x-text="feature.icon"></span>
                        </div>
                        <p class=" text-black" x-text="feature.feature"></p>
                    </div>
                </template>
            </div>
        </div>
        <hr class="border-t-4  border-gray-300 m-14">

        <!-- Property Rules / Information -->
        <div class="container mx-auto max-w-5xl mt-8 p-6">
            <h2 class="text-xl font-bold mb-4">Property Rules / Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 1 .5.5v4.25l3.5 2.1a.5.5 0 1 1-.5.866L8 8.417V4a.5.5 0 0 1 .5-.5z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z" />
                    </svg>
                    <p class="text-gray-700">{{ $business['check_in'] }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 1 .5.5v4.25l3.5 2.1a.5.5 0 1 1-.5.866L8 8.417V4a.5.5 0 0 1 .5-.5z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z" />
                    </svg>
                    <p class="text-gray-700">{{ $business['check_out'] }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <img src={{ asset('front/assets/icons/person.svg') }} class="h-5 w-2" />
                    <p class="text-gray-700">
                        @if (!empty($business['age_restriction']))
                            {{ $business['age_restriction'] }}
                        @else
                            No age restriction
                        @endif
                    </p>
                </div>
                <div class="flex items-center space-x-2">
                    <svg width="28" height="22" viewBox="0 0 32 29" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24.7491 7.56298L21.0291 2.18998C20.7534 1.79271 20.387 1.46684 19.9602 1.23938C19.5335 1.01192 19.0587 0.889401 18.5751 0.881982L11.5161 0.781982H11.5011C7.85714 0.781982 5.06114 1.39198 3.26014 4.36698C1.58414 7.13398 0.869141 11.851 0.869141 20.137V21.15H3.18314L1.69414 28.75H3.75714L5.24614 21.15H5.93214C7.58643 21.1648 9.18017 20.5283 10.3691 19.378C11.4911 18.265 12.2693 16.8529 12.6111 15.31V15.295L14.3481 6.97198H12.2821L10.6381 14.851C10.1381 16.919 8.63814 19.124 5.93814 19.124H2.89814C2.95314 11.955 3.60614 7.70498 4.99814 5.41298C6.15814 3.48898 7.86014 2.80198 11.4951 2.80198L18.5461 2.90198C18.7085 2.90406 18.868 2.94511 19.0113 3.02168C19.1545 3.09825 19.2772 3.2081 19.3691 3.34198L23.5691 9.41998L29.2211 10.362V11.435L28.2781 16.462C28.0001 17.946 27.5241 18.693 25.5781 18.927L17.5841 20.295L17.5311 28.745H19.5561L19.5981 22.005L25.8451 20.935C27.04 20.8604 28.1703 20.3668 29.0371 19.541C29.7116 18.7841 30.1411 17.8407 30.2691 16.835L31.2461 11.623V8.64598L24.7491 7.56298Z"
                            fill="black" />
                    </svg>
                    <p class="text-gray-700">
                        @if ($business['pets_permission'] == 'YES')
                            Pets are allowed
                        @else
                            Pets are not allowed
                        @endif
                    </p>
                </div>
                <div class="flex items-center space-x-2">
                    <svg width="33" height="27" viewBox="0 0 33 27" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.424 0.509033H0.000976562V22.373H28.424V0.509033ZM26.237 20.186H2.18698V2.69503H26.237V20.186Z"
                            fill="black" />
                        <path d="M30.6098 5.9751V24.5591H5.4668V26.7451H32.7968V5.9751H30.6098Z" fill="black" />
                        <path
                            d="M14.212 16.8021C15.5727 16.7408 16.8538 16.1435 17.7754 15.1407C18.6971 14.1379 19.1845 12.8111 19.131 11.4501C19.1845 10.0892 18.6971 8.76236 17.7754 7.75955C16.8538 6.75675 15.5727 6.15945 14.212 6.09814C12.8514 6.15945 11.5703 6.75675 10.6486 7.75955C9.72696 8.76236 9.2396 10.0892 9.29303 11.4501C9.2396 12.8111 9.72696 14.1379 10.6486 15.1407C11.5703 16.1435 12.8514 16.7408 14.212 16.8021ZM14.212 8.28514C14.9919 8.34781 15.7157 8.71505 16.2268 9.30739C16.7379 9.89973 16.9952 10.6695 16.943 11.4501C16.9952 12.2311 16.7376 13.0012 16.2261 13.5936C15.7146 14.1859 14.9903 14.553 14.21 14.6151C13.4298 14.553 12.7055 14.1859 12.194 13.5936C11.6824 13.0012 11.4249 12.2311 11.477 11.4501C11.4249 10.6689 11.6827 9.89853 12.1947 9.30608C12.7066 8.71363 13.4315 8.34681 14.212 8.28514Z"
                            fill="black" />
                        <path d="M4.37402 5.42798H6.56002V17.453H4.37402V5.42798Z" fill="black" />
                        <path d="M21.8647 5.42798H24.0507V17.453H21.8647V5.42798Z" fill="black" />
                    </svg>
                    <p class="text-gray-700">Accepted payment methods</p>
                </div>
                <div class="flex items-center space-x-4 mt-4 md:mt-0">
                    <img src={{ asset('front/assets/icons/visa-card.svg') }} alt="Visa" class="w-10 h-6">
                    <img src={{ asset('front/assets/icons/master-card.svg') }} alt="MasterCard" class="w-10 h-6">
                    <img src={{ asset('front/assets/icons/amex.svg') }} alt="Amex" class="w-10 h-6">
                    <img src={{ asset('front/assets/icons/paypal.svg') }} alt="PayPal" class="w-10 h-6">
                </div>
            </div>
        </div>
    </section>


    <!-- Customers Honest Reviews -->
    <div class="container mx-auto max-w-6xl mt-8 p-12  bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-center mb-1">Customers Honest Reviews</h2>
        <p class="text-center text-gray-400 text-sm mb-8">Discover the experiences of those who have achieved success with
            us</p>

        <div class="flex flex-col md:flex-row md:space-x-8 px-14">
            <!-- Left Section: Review Summary -->
            <div class="w-full h-min md:w-1/3 bg-white p-8 rounded-lg shadow-md mb-6 md:mb-0">
                <h3 class="text-xl font-semibold mb-4">4,265 Reviews</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-gray-700">Cleanliness</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-purple-600 h-2.5 rounded-full" style="width: 80%"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-700">Comfort</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-purple-600 h-2.5 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-700">Staff & Service</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-purple-600 h-2.5 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-700">Location</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-purple-600 h-2.5 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-700">Property Condition & Facilities</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-purple-600 h-2.5 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-700">Value for Money</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-purple-600 h-2.5 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section: Detailed Reviews -->
            <div class="w-full md:w-2/3 right-4">
                <div class="flex items-center mb-4">
                    <p class="text-black font-semibold">Sort By:</p>
                    <div class="flex space-x-2 p-2">
                        <select class="border-gray-300 rounded-md shadow-sm">
                            <option>Rating</option>
                            <option>Date</option>
                        </select>
                    </div>
                </div>
                <hr class="border-t border-gray-300 my-3">
                <div class="space-y-6">
                    <div>
                        <div class="flex space-x-4">
                            <div class=" w-48 h-48 pt-10">
                                <img src={{ asset('front/assets/images/male-icon.png') }} class="" />
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-violet-950">Jessica G. <span
                                        class="text-gray-500 text-sm">April 8, 2024</span></h4>
                                <p class="text-gray-700 mt-2">
                                    The location of the hotel was perfect for our needs. We were able to easily explore the
                                    city and also had access to plenty of great dining options nearby.
                                </p>
                                <p class="text-yellow-500">★★★★★</p>
                            </div>
                        </div>
                        <hr class="border-t border-gray-300">
                    </div>

                    <div>
                        <div class="flex space-x-4">
                            <div class=" w-48 h-48 pt-10">
                                <img src={{ asset('front/assets/images/male-icon.png') }} class="" />
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-violet-950">Jessica G. <span
                                        class="text-gray-500 text-sm">April 8, 2024</span></h4>
                                <p class="text-gray-700 mt-2">
                                    The location of the hotel was perfect for our needs. We were able to easily explore the
                                    city and also had access to plenty of great dining options nearby.
                                </p>
                                <p class="text-yellow-500">★★★★★</p>
                            </div>
                        </div>
                        <hr class="border-t border-gray-300">
                    </div>
                    <div>
                        <div class="flex space-x-4">
                            <div class=" w-48 h-48 pt-10">
                                <img src={{ asset('front/assets/images/male-icon.png') }} class="" />
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-violet-950">Jessica G. <span
                                        class="text-gray-500 text-sm">April 8, 2024</span></h4>
                                <p class="text-gray-700 mt-2">
                                    The location of the hotel was perfect for our needs. We were able to easily explore the
                                    city and also had access to plenty of great dining options nearby.
                                </p>
                                <p class="text-yellow-500">★★★★★</p>
                            </div>
                        </div>
                        <hr class="border-t border-gray-300">
                    </div>
                    <div>
                        <div class="flex space-x-4">
                            <div class=" w-48 h-48 pt-10">
                                <img src={{ asset('front/assets/images/male-icon.png') }} class="" />
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-violet-950">Jessica G. <span
                                        class="text-gray-500 text-sm">April 8, 2024</span></h4>
                                <p class="text-gray-700 mt-2">
                                    The location of the hotel was perfect for our needs. We were able to easily explore the
                                    city and also had access to plenty of great dining options nearby.
                                </p>
                                <p class="text-yellow-500">★★★★★</p>
                            </div>
                        </div>
                        <hr class="border-t border-gray-300">
                    </div>
                    <div>
                        <div class="flex space-x-4">
                            <div class=" w-48 h-48 pt-10">
                                <img src={{ asset('front/assets/images/male-icon.png') }} class="" />
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-violet-950">Jessica G. <span
                                        class="text-gray-500 text-sm">April 8, 2024</span></h4>
                                <p class="text-gray-700 mt-2">
                                    The location of the hotel was perfect for our needs. We were able to easily explore the
                                    city and also had access to plenty of great dining options nearby.
                                </p>
                                <p class="text-yellow-500">★★★★★</p>
                            </div>
                        </div>
                        <hr class="border-t border-gray-300">
                    </div>
                    <div>
                        <div class="flex space-x-4">
                            <div class=" w-48 h-48 pt-10">
                                <img src={{ asset('front/assets/images/male-icon.png') }} class="" />
                            </div>
                            <div class="p-3">
                                <h4 class="font-semibold text-violet-950">Jessica G. <span
                                        class="text-gray-500 text-sm">April 8, 2024</span></h4>
                                <p class="text-gray-700 mt-2">
                                    The location of the hotel was perfect for our needs. We were able to easily explore the
                                    city and also had access to plenty of great dining options nearby.
                                </p>
                                <p class="text-yellow-500">★★★★★</p>
                            </div>
                        </div>
                        <hr class="border-t border-gray-300">
                    </div>
                    <div class="items-center justify-center  flex space-x-4">
                        <button class="px-4 py-2 bg-violet-950 text-gray-200 text-sm-center rounded">
                            Load more
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Frequently Asked Questions -->
    <section class=" text-black py-24 min-h-screen">
        <div class="container flex flex-col justify-center mx-auto">
            <h2 class=" text-xl font-bold leadi text-center sm:text-xl">Frequently Asked Questions</h2>
            <h2 class="mb-12 text-sm  text-center sm:text-sm">Discover the experiences of those who have achieved success
                with us</h2>
            <div class="flex flex-col divide-y sm:px-8 lg:px-12 xl:px-32 divide-gray-700">
                <ul class="basis-1/2">
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-base-content">How secure is my insurance information?</span>
                            <svg width="18" height="18" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z"
                                    stroke="black" stroke-width="1.5" />
                                <path
                                    d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z"
                                    fill="black" />
                            </svg>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div class="pb-5 leading-relaxed">
                                <div class="space-y-2 leading-relaxed">We prioritize the security of your insurance
                                    information. We use advanced encryption and strict data protection measures to ensure
                                    your data is safe and confidential.</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-base-content">How can I customize my insurance coverage?</span>
                            <svg width="18" height="18" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z"
                                    stroke="black" stroke-width="1.5" />
                                <path
                                    d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z"
                                    fill="black" />
                            </svg>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div class="pb-5 leading-relaxed">
                                <div class="space-y-2 leading-relaxed">Our insurance plans are customizable. You can tailor
                                    your coverage to meet your specific needs and budget.</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-base-content">Is there a waiting period for insurance claims?</span>
                            <svg width="18" height="18" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z"
                                    stroke="black" stroke-width="1.5" />
                                <path
                                    d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z"
                                    fill="black" />
                            </svg>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div class="pb-5 leading-relaxed">
                                <div class="space-y-2 leading-relaxed">There may be a waiting period for certain insurance
                                    claims, depending on the policy terms and conditions. Please refer to your policy
                                    documents for details.</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-base-content">Is there a waiting period for insurance claims?</span>
                            <svg width="18" height="18" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z"
                                    stroke="black" stroke-width="1.5" />
                                <path
                                    d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z"
                                    fill="black" />
                            </svg>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div class="pb-5 leading-relaxed">
                                <div class="space-y-2 leading-relaxed">There may be a waiting period for certain insurance
                                    claims, depending on the policy terms and conditions. Please refer to your policy
                                    documents for details.</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button
                            class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                            aria-expanded="false" onclick="toggleFAQ(this)">
                            <span class="flex-1 text-base-content">Is there a waiting period for insurance claims?</span>
                            <svg width="18" height="18" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z"
                                    stroke="black" stroke-width="1.5" />
                                <path
                                    d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z"
                                    fill="black" />
                            </svg>
                        </button>
                        <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                            style="transition: max-height 0.3s ease-in-out 0s;">
                            <div class="pb-5 leading-relaxed">
                                <div class="space-y-2 leading-relaxed">There may be a waiting period for certain insurance
                                    claims, depending on the policy terms and conditions. Please refer to your policy
                                    documents for details.</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Your Recent Searches -->
    <div class="container mx-auto max-w-full mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-2">Your Recent Searches</h2>
        <p class="text-center text-gray-600 mb-8">Discover the experiences of those who have achieved success with us</p>

        <div class="flex justify-center items-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- First Search Card -->
                <div class="flex flex-col md:flex-row rounded-lg border-2 border-gray-100 max-w-sm mx-auto">
                    <img src="{{ asset('front/assets/images/hotel-Newyork.svg') }}" alt="Hotel Image"
                        class="w-full md:w-1/3 max-h-max rounded-md">
                    <div class="flex flex-col justify-between px-4">
                        <div>
                            <h3 class="text-lg font-semibold">Hotel Arc New York City</h3>
                            <p class="text-gray-500">New York, United States</p>
                            <div class="flex items-center mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-500 h-5 w-5 mr-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927C9.27 2.373 9.73 2 10.3 2c.571 0 1.03.373 1.251.927l1.45 3.22 3.51.511c.558.081.779.756.376 1.145l-2.545 2.48.601 3.5c.093.544-.474.955-.95.7L10 13.348l-3.147 1.653c-.476.255-1.042-.156-.95-.7l.601-3.5-2.545-2.48c-.403-.389-.182-1.064.376-1.145l3.51-.511 1.45-3.22z" />
                                </svg>
                                <span class="text-gray-700">4.5</span>
                                <span class="text-gray-500 ml-2">(228 reviews)</span>
                            </div>
                        </div>
                        <div class="text-xl text-red-500 font-semibold mt-2">$243.00</div>
                    </div>
                </div>
                <!-- Second Search Card -->
                <div class="flex flex-col md:flex-row rounded-lg border-2 border-gray-100  max-w-sm mx-auto">
                    <img src="{{ asset('front/assets/images/hotel-Newyork.svg') }}" alt="Hotel Image"
                        class="w-full md:w-1/3 max-h-max rounded-md">
                    <div class="flex flex-col justify-between px-4">
                        <div>
                            <h3 class="text-lg font-semibold">Hotel Arc New York City</h3>
                            <p class="text-gray-500">New York, United States</p>
                            <div class="flex items-center mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-500 h-5 w-5 mr-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927C9.27 2.373 9.73 2 10.3 2c.571 0 1.03.373 1.251.927l1.45 3.22 3.51.511c.558.081.779.756.376 1.145l-2.545 2.48.601 3.5c.093.544-.474.955-.95.7L10 13.348l-3.147 1.653c-.476.255-1.042-.156-.95-.7l.601-3.5-2.545-2.48c-.403-.389-.182-1.064.376-1.145l3.51-.511 1.45-3.22z" />
                                </svg>
                                <span class="text-gray-700">4.5</span>
                                <span class="text-gray-500 ml-2">(228 reviews)</span>
                            </div>
                        </div>
                        <div class="text-xl text-red-500 font-semibold mt-2">$243.00</div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    @include('front.partials.footer')
@endsection
@push('scripts')
    <script>
        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
            content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Setting mediaData");
            window.mediaData = @json($media);
            console.log(window.mediaData);
        });

        function gallery() {
            return {
                images: [],
                isModalOpen: false,
                modalIndex: 0,
                initializeImages() {
                    console.log("Initializing gallery component");
                    this.waitForMediaData(() => {
                        if (window.mediaData && Array.isArray(window.mediaData)) {
                            console.log("Media data found, initializing images");
                            this.images = window.mediaData.map(media => ({
                                src: media.org_url,
                                alt: media.name,
                            }));
                            console.log(this.images);
                        } else {
                            console.error('mediaData is not available or not an array');
                        }
                    });
                },
                waitForMediaData(callback) {
                    const checkMediaData = () => {
                        if (window.mediaData && Array.isArray(window.mediaData)) {
                            callback();
                        } else {
                            setTimeout(checkMediaData, 50);
                        }
                    };
                    checkMediaData();
                },
                get visibleImages() {
                    return this.images.slice(0, 4);
                },
                get gridClass() {
                    switch (this.images.length) {
                        case 1:
                            return 'grid grid-cols-1 gap-2';
                        case 2:
                            return 'grid grid-cols-2 gap-2';
                        case 3:
                            return 'grid grid-cols-3 gap-2';
                        case 4:
                            return 'grid grid-cols-2 gap-2';
                        default:
                            return 'grid grid-cols-2 gap-2';
                    }
                },
                openModal(index) {
                    this.modalIndex = index;
                    this.isModalOpen = true;
                },
                next() {
                    if (this.modalIndex < this.images.length - 1) {
                        this.modalIndex++;
                    }
                },
                prev() {
                    if (this.modalIndex > 0) {
                        this.modalIndex--;
                    }
                }
            };
        }


        //get features from json files
        function featureDisplay() {
            return {
                features: [],
                databaseFeatures: @json($business['features']), // Assuming $business['features'] contains the features from the database
                matchedFeatures: [],
                fetchFeatures() {
                    fetch('/features.json')
                        .then(response => response.json())
                        .then(data => {
                            this.features = data;
                            this.matchFeatures();
                        })
                        .catch(error => console.error('Error fetching features:', error));
                },
                matchFeatures() {
                    const dbFeatureNames = this.databaseFeatures.map(dbFeature => dbFeature.name);
                    this.matchedFeatures = this.features.filter(feature =>
                        dbFeatureNames.includes(feature.feature)
                    );
                }
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mapModal', (location) => ({
                open: false,
                location: location,
                init() {
                    this.$watch('open', (value) => {
                        if (value) {
                            this.initMap();
                        }
                    });
                },
                initMap() {
                    const geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ address: this.location }, (results, status) => {
                        if (status === 'OK') {
                            const loc = results[0].geometry.location;
                            const map = new google.maps.Map(document.getElementById('map'), {
                                center: loc,
                                zoom: 14,
                            });
                            new google.maps.Marker({
                                position: loc,
                                map: map,
                            });
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }
            }));
        });
    </script>
    

@endpush
