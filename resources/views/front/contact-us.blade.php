@extends('front.layouts.app')

@section('title', 'Contact US')
@section('header-title', 'Contact Us')
@section('header-subtitle', '')

@section('content')
    @include('front.partials.banner')
    
    <div class=" flex items-center justify-center min-h-screen">
        <div class="container flex flex-row w-3/4  mx-auto pt-40">
            <!-- Contact Info Section -->
            <div class="w-1/2 p-18">
                <h2 class="text-3xl font-semibold mb-6">DON'T HESITATE TO CONTACT WITH US</h2>
                <div class="mb-6  flex items-start">
                    <div class="text-orange-500 mr-4 p-2">
                        <svg width="50" height="50" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.0186 56C43.4825 56 56.0186 43.464 56.0186 28C56.0186 12.536 43.4825 0 28.0186 0C12.5546 0 0.0185547 12.536 0.0185547 28C0.0185547 43.464 12.5546 56 28.0186 56Z" fill="#EC642A"/>
                            <path d="M27.9055 12.154C24.6281 12.158 21.4861 13.4617 19.1686 15.7791C16.8511 18.0966 15.5474 21.2386 15.5435 24.516C15.5395 27.1942 16.4142 29.7998 18.0335 31.933C18.0335 31.933 18.3705 32.377 18.4255 32.441L27.9055 43.621L37.3895 32.435C37.4385 32.375 37.7775 31.935 37.7775 31.935C39.396 29.8026 40.2704 27.1981 40.2665 24.521C40.2638 21.2429 38.9608 18.0998 36.6435 15.7812C34.3261 13.4627 31.1835 12.1582 27.9055 12.154ZM27.9055 29.011C27.0155 29.011 26.1454 28.7471 25.4054 28.2526C24.6654 27.7581 24.0886 27.0553 23.748 26.2331C23.4074 25.4108 23.3183 24.506 23.4919 23.6331C23.6656 22.7602 24.0942 21.9583 24.7235 21.329C25.3528 20.6997 26.1546 20.2711 27.0276 20.0975C27.9005 19.9238 28.8053 20.0129 29.6275 20.3535C30.4498 20.6941 31.1526 21.2709 31.6471 22.0109C32.1416 22.7509 32.4055 23.621 32.4055 24.511C32.4055 25.7045 31.9314 26.8491 31.0875 27.693C30.2435 28.5369 29.0989 29.011 27.9055 29.011Z" fill="white"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Location</h3>
                        <p>1535 W Hildebrand Ave, San Antonio, TX, United States, Texas</p>
                    </div>
                </div>
                <div class="mb-6 flex items-start">
                    <div class="text-orange-500 mr-4 p-2">
                        <svg width="50" height="50" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.0186 56C43.4825 56 56.0186 43.464 56.0186 28C56.0186 12.536 43.4825 0 28.0186 0C12.5546 0 0.0185547 12.536 0.0185547 28C0.0185547 43.464 12.5546 56 28.0186 56Z" fill="#EC642A"/>
                            <path d="M42.7998 22.877L42.8698 37.694C42.873 38.0878 42.7978 38.4782 42.6487 38.8427C42.4995 39.2071 42.2793 39.5382 42.001 39.8168C41.7226 40.0953 41.3917 40.3157 41.0273 40.4651C40.663 40.6145 40.2726 40.6899 39.8788 40.687H16.1568C15.7624 40.6946 15.3707 40.6214 15.0057 40.4717C14.6407 40.3221 14.3103 40.0993 14.0348 39.817C13.7526 39.5413 13.5298 39.2107 13.3804 38.8455C13.2309 38.4804 13.1579 38.0885 13.1658 37.694V22.877C13.148 22.3631 13.2676 21.8537 13.512 21.4013C13.7565 20.9489 14.1171 20.5698 14.5568 20.303L27.9828 12.443L41.4088 20.303C41.8484 20.5698 42.209 20.9489 42.4535 21.4013C42.698 21.8537 42.8175 22.3631 42.7998 22.877ZM27.9828 30.251L40.2958 22.599L27.9828 15.434L15.7398 22.599L27.9828 30.251Z" fill="white"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Email Address</h3>
                        <p>info@rentown.com</p>
                    </div>
                </div>
                <div class="mb-6 flex items-start">
                    <div class="text-orange-500 mr-4 p-2">
                        <svg width="50" height="50" viewBox="0 0 57 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.0186 56C43.4825 56 56.0186 43.464 56.0186 28C56.0186 12.536 43.4825 0 28.0186 0C12.5546 0 0.0185547 12.536 0.0185547 28C0.0185547 43.464 12.5546 56 28.0186 56Z" fill="#EC642A"/>
                            <mask id="mask0_25_2400" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="15" y="15" width="26" height="26">
                            <path d="M40.7675 15.25H15.2695V40.749H40.7675V15.25Z" fill="white"/>
                            </mask>
                            <g mask="url(#mask0_25_2400)">
                            <path d="M21.9395 15.25C22.0145 15.28 22.0895 15.313 22.1655 15.338C22.4125 15.4171 22.6289 15.5708 22.7849 15.7781C22.9409 15.9853 23.0288 16.2358 23.0365 16.495C23.0499 17.6074 23.1667 18.7162 23.3855 19.807C23.5275 20.42 23.6975 21.026 23.8685 21.632C23.9715 21.9363 23.9833 22.2641 23.9025 22.575C23.8216 22.8859 23.6517 23.1664 23.4135 23.382C22.4582 24.3047 21.4985 25.2227 20.5345 26.136C20.5048 26.1558 20.4795 26.1816 20.4602 26.2116C20.4408 26.2416 20.4278 26.2753 20.422 26.3106C20.4162 26.3458 20.4177 26.3819 20.4264 26.4165C20.4351 26.4512 20.4508 26.4837 20.4725 26.512C22.1642 29.7034 24.6338 32.4165 27.6525 34.4C28.2525 34.808 28.8995 35.158 29.5175 35.544C29.5431 35.5665 29.5733 35.5834 29.6059 35.5933C29.6385 35.6032 29.6729 35.6061 29.7067 35.6016C29.7405 35.5972 29.773 35.5855 29.8019 35.5675C29.8309 35.5494 29.8556 35.5254 29.8745 35.497C30.8255 34.535 31.7795 33.575 32.7475 32.629C32.9384 32.4349 33.1676 32.2826 33.4205 32.182C33.638 32.1073 33.8741 32.1073 34.0915 32.182C35.0257 32.5503 36.0028 32.7987 36.9995 32.921C37.8305 33.021 38.6695 33.046 39.4995 33.121C39.7892 33.1248 40.0687 33.2285 40.2908 33.4145C40.5129 33.6005 40.664 33.8575 40.7185 34.142C40.7309 34.1719 40.7463 34.2003 40.7645 34.227V39.606C40.3835 40.565 40.0765 40.765 39.0195 40.747C37.1517 40.7225 35.2929 40.4816 33.4805 40.029C29.764 39.1039 26.3247 37.2977 23.4535 34.763C21.1939 32.785 19.3279 30.3982 17.9535 27.728C16.6834 25.3077 15.8554 22.6802 15.5085 19.969C15.3705 18.892 15.3275 17.804 15.2705 16.72C15.2387 16.44 15.2987 16.1572 15.4416 15.9142C15.5844 15.6713 15.8023 15.4813 16.0625 15.373C16.1705 15.322 16.2945 15.291 16.4115 15.25H21.9395Z" fill="white"/>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Call Us</h3>
                        <p>+1 43556346</p>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form Section -->
            <div class="w-1/2  p-10 bg-violet-950 text-white rounded-lg">
                <h3 class="text-xl mb-4">Get in touch with us and let's start a conversation about how we can help you.</h3>
                <form action="#" method="POST" class="space-y-4">
                    <div class="flex space-x-2">
                        <input type="text" name="name" placeholder="Name*" class="w-1/2 p-2 rounded bg-violet-950 text-white">
                        <input type="email" name="email" placeholder="Email*" class="w-1/2 p-2 rounded bg-violet-950 text-white">
                    </div>
                    <input type="text" name="phone" placeholder="Mobile Number" class="w-full p-2 rounded bg-violet-950 text-white">
                    <textarea name="message" rows="4" placeholder="Describe what you need..." class="w-full p-2 rounded bg-violet-950 text-white"></textarea>
                    <div class="flex items-center justify-center">
                        <button type="submit" class="w-1/2 p-2 bg-orange-500 text-white rounded ">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class=" w-full flex items-center justify-center">
        <div class="w-full  mx-auto p-20">
            <h1 class="text-2xl font-bold mb-6">Here we go on map</h1>
            <div class="overflow-hidden">
                <img src={{asset('front/assets/images/passenger-plane-airport-near-terminal-stands-concept-flight-airport-vacation.svg')}} alt="Map" class="w-full h-auto">
            </div>
        </div>
    </div>

    @include('front.partials.footer')
@endsection
