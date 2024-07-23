<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Page</title>

    @vite('resources/scss/app.scss')
</head>

<body>
    <div class="bg-custom">
    <!-- Back to Home Button -->
    <div class="absolute top-0 left-0 m-4 flex items-center space-x-2 text-white z-10">
        <img src="{{ asset('/front/assets/images/back.svg') }}" alt="Back button" class="w-12 h-12">
        <span class="opacity-85">Back to home</span>
    </div>

    <!-- Register Form -->
    <div class="flex items-center justify-center w-full p-4 relative z-10">
        <div class="bg-white rounded-xl p-6 w-full max-w-xs sm:max-w-md lg:max-w-md shadow-lg">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img class="h-12 w-auto sm:h-14 lg:h-18" src="{{ asset('front/assets/images/logo.svg') }}" alt="Your Company">
            </div>
            <!-- Register Form -->
            <div>
                <h2 class="text-sm sm:text-base lg:text-lg font-bold text-left uppercase text-black mb-6">REGISTER ME&nbsp;|&nbsp;<a href="{{ url('/login') }}" class="underline underline-offset-2 text-indigo-900">Login</a></h2>
                <div class="flex justify-center w-full">
                    <div class="flex flex-col w-2/3">
                        <div class="flex justify-between mb-1">
                            <span class="text-base font-medium text-blue-700 dark:text-white"></span>
                            <!-- Empty span for spacing -->
                            <span class="text-sm font-medium text-orange-500 dark:text-white">2/2</span>
                        </div>
                        <div class="w-full bg-orange-200 rounded-full h-1 dark:bg-gray-700">
                            <div class="bg-orange-600 h-1 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
               
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form class="space-y-4" method="POST" action="{{ route('register.step2.post') }}" >
                   @csrf
                    <div class="mt-8">
                        <label for="email" class="block text-sm font-medium text-gray-700">Mobile Number</label>


                        <div class="flex items-center">
                            <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone"
                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                type="button">
                                <svg fill="none" aria-hidden="true" class="h-4 w-4 me-2" viewBox="0 0 20 15">
                                    <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                    <mask id="a" style="mask-type:luminance" width="20" height="15" x="0"
                                        y="0" maskUnits="userSpaceOnUse">
                                        <rect width="19.6" height="14" y=".5" fill="#fff" rx="2" />
                                    </mask>
                                    <g mask="url(#a)">
                                        <path fill="#D02F44" fill-rule="evenodd"
                                            d="M19.6.5H0v.933h19.6V.5zm0 1.867H0V3.3h19.6v-.933zM0 4.233h19.6v.934H0v-.934zM19.6 6.1H0v.933h19.6V6.1zM0 7.967h19.6V8.9H0v-.933zm19.6 1.866H0v.934h19.6v-.934zM0 11.7h19.6v.933H0V11.7zm19.6 1.867H0v.933h19.6v-.933z"
                                            clip-rule="evenodd" />
                                        <path fill="#46467F" d="M0 .5h8.4v6.533H0z" />
                                        <g filter="url(#filter0_d_343_121520)">
                                            <path fill="url(#paint0_linear_343_121520)" fill-rule="evenodd"
                                                d="M1.867 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.866 0a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM7.467 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zM2.333 3.3a.467.467 0 100-.933.467.467 0 000 .933zm2.334-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.4.467a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm-2.334.466a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.466a.467.467 0 11-.933 0 .467.467 0 01.933 0zM1.4 4.233a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM6.533 4.7a.467.467 0 11-.933 0 .467.467 0 01.933 0zM7 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zM3.267 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0z"
                                                clip-rule="evenodd" />
                                        </g>
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_343_121520" x1=".933" x2=".933"
                                            y1="1.433" y2="6.1" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#fff" />
                                            <stop offset="1" stop-color="#F0F0F0" />
                                        </linearGradient>
                                        <filter id="filter0_d_343_121520" width="6.533" height="5.667" x=".933"
                                            y="1.433" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" result="hardAlpha"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                            <feOffset dy="1" />
                                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                            <feBlend in2="BackgroundImageFix" result="effect1_dropShadow_343_121520" />
                                            <feBlend in="SourceGraphic" in2="effect1_dropShadow_343_121520"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                                <span class="text-red-600 font-semibold">+1</span> <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="dropdown-phone"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdown-phone-button">
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <span class="inline-flex items-center">
                                                <svg fill="none" aria-hidden="true" class="h-4 w-4 me-2"
                                                    viewBox="0 0 20 15">
                                                    <rect width="19.6" height="14" y=".5" fill="#fff"
                                                        rx="2" />
                                                    <mask id="a" style="mask-type:luminance" width="20"
                                                        height="15" x="0" y="0" maskUnits="userSpaceOnUse">
                                                        <rect width="19.6" height="14" y=".5" fill="#fff"
                                                            rx="2" />
                                                    </mask>
                                                    <g mask="url(#a)">
                                                        <path fill="#D02F44" fill-rule="evenodd"
                                                            d="M19.6.5H0v.933h19.6V.5zm0 1.867H0V3.3h19.6v-.933zM0 4.233h19.6v.934H0v-.934zM19.6 6.1H0v.933h19.6V6.1zM0 7.967h19.6V8.9H0v-.933zm19.6 1.866H0v.934h19.6v-.934zM0 11.7h19.6v.933H0V11.7zm19.6 1.867H0v.933h19.6v-.933z"
                                                            clip-rule="evenodd" />
                                                        <path fill="#46467F" d="M0 .5h8.4v6.533H0z" />
                                                        <g filter="url(#filter0_d_343_121520)">
                                                            <path fill="url(#paint0_linear_343_121520)"
                                                                fill-rule="evenodd"
                                                                d="M1.867 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.866 0a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM7.467 1.9a.467.467 0 11-.934 0 .467.467 0 01.934 0zM2.333 3.3a.467.467 0 100-.933.467.467 0 000 .933zm2.334-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm1.4.467a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.934 0 .467.467 0 01.934 0zm-2.334.466a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.466a.467.467 0 11-.933 0 .467.467 0 01.933 0zM1.4 4.233a.467.467 0 100-.933.467.467 0 000 .933zm1.4.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zm1.4.467a.467.467 0 100-.934.467.467 0 000 .934zM6.533 4.7a.467.467 0 11-.933 0 .467.467 0 01.933 0zM7 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.933 0 .467.467 0 01.933 0zM3.267 6.1a.467.467 0 100-.933.467.467 0 000 .933zm-1.4-.467a.467.467 0 11-.934 0 .467.467 0 01.934 0z"
                                                                clip-rule="evenodd" />
                                                        </g>
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_343_121520" x1=".933"
                                                            x2=".933" y1="1.433" y2="6.1"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#fff" />
                                                            <stop offset="1" stop-color="#F0F0F0" />
                                                        </linearGradient>
                                                        <filter id="filter0_d_343_121520" width="6.533"
                                                            height="5.667" x=".933" y="1.433"
                                                            color-interpolation-filters="sRGB"
                                                            filterUnits="userSpaceOnUse">
                                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                            <feColorMatrix in="SourceAlpha" result="hardAlpha"
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                                            <feOffset dy="1" />
                                                            <feColorMatrix
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                                            <feBlend in2="BackgroundImageFix"
                                                                result="effect1_dropShadow_343_121520" />
                                                            <feBlend in="SourceGraphic"
                                                                in2="effect1_dropShadow_343_121520" result="shape" />
                                                        </filter>
                                                    </defs>
                                                </svg>
                                                United States (+1)
                                            </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <label for="phone-input"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Phone
                                number:</label>
                            <div class="relative w-full">
                                <input type="text" id="mobile_number" name="mobile_number"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                     placeholder="000-0000-000" required />
                            
                                    <button type="button" onclick="togglePassword()"
                                    class="absolute top-0 right-0 p-3.5 rounded-e-md">
                                    <svg class="flex-shrink-0 size-3.5 text-gray-400 dark:text-neutral-600"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                        </path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22"
                                            y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3"></circle>
                                    </svg>
                                </button>

                                @error('mobile_number')
                <div style="color: red;">{{ $message }}</div>
            @enderror
                            </div>
                        </div>


                    </div>

                    <div class="max-w-lg mx-auto mt-10">
                        <div class="flex flex-col sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0">
                            <div class="w-full">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input id="password" name="password" type="password" autocomplete="given-name"
                                    placeholder="Password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                            
                                    @error('password')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                                </div>
                            <div class="w-full">
                                <label for="c_password" class="block text-sm font-medium text-gray-700">Confirm
                                    Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="family-name"
                                    placeholder="Confirm Password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                                    @error('password_confirmation')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-violet-950 hover:bg-violet-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:bg-violet-950">
                            Create Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @vite('resources/js/app.js')
</body>

</html>
