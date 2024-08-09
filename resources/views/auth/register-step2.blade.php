<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Page</title>
    @vite('resources/scss/app.scss')
    <style>
        #dropdown-content {
            max-height: 150px;
            overflow-y: auto;
        }
        .flag-img {
            width: 20px;
            height: 14px;
            margin-right: 8px;
        }
    </style>
</head>
<body class="bg-custom">
    <!-- Back to Home Button -->
    <div class="absolute top-0 left-0 m-4 flex items-center space-x-2 text-white z-10">
        <a href="{{ route('register.step1') }}" class="flex items-center space-x-2">
            <img src="{{ asset('/front/assets/images/back.svg') }}" alt="Back button" class="w-12 h-12"/>
            <span class="opacity-85">Back to home</span>
        </a>
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
                <form class="space-y-4" method="POST" action="{{ route('register.step2.post') }}" onsubmit="preparePhoneNumber()">
                    @csrf

                    <div class="mt-8">
                        <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <div class="flex items-center mt-2 relative">
                            <!-- Country Code Dropdown Button -->
                            <div id="dropdown-container" class="relative">
                                <button id="dropdown-button" type="button" class="flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                    <img id="flag-img" src="https://flagcdn.com/es.svg" alt="Flag" class="w-5 h-5">
                                    <span id="country-code" class="ml-2">+34</span>
                                    <svg class="w-4 h-4 ml-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="dropdown-content" class="absolute hidden mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10 w-48">
                                    <!-- Dropdown options will be appended here by JavaScript -->
                                </div>
                            </div>
                            <!-- Phone Number Input -->
                            <input type="number" id="phone_number" name="phone_number"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 border-t border-b border-r border-gray-300 rounded-r-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="000-000-000" required>
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
                                <label for="c_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="family-name"
                                    placeholder="Confirm Password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                                @error('password_confirmation')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="mobile_number" name="mobile_number" value="">
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

    <script>
        async function fetchCountryCodes() {
            try {
                const response = await fetch('/countryCodes.json');
                return await response.json();
            } catch (error) {
                console.error('Error fetching country codes:', error);
                return [];
            }
        }

        async function populateCountryCodes() {
            const countryCodes = await fetchCountryCodes();
            const dropdownContent = document.getElementById('dropdown-content');

            countryCodes.forEach(country => {
                const option = document.createElement('div');
                option.classList.add('flex', 'items-center', 'p-2', 'hover:bg-gray-100', 'cursor-pointer');
                option.innerHTML = `<img src="${country.flag}" alt="${country.name} flag" class="w-5 h-5 mr-2"> ${country.name} (${country.code})`;
                option.addEventListener('click', () => {
                    document.getElementById('flag-img').src = country.flag;
                    document.getElementById('country-code').innerText = country.code;
                    document.getElementById('phone_number').placeholder = country.format;
                    document.getElementById('mobile_number').value = country.code + document.getElementById('phone_number').value;
                    dropdownContent.classList.add('hidden');
                });
                dropdownContent.appendChild(option);
            });
        }

        function preparePhoneNumber() {
            const countryCode = document.getElementById('country-code').innerText;
            const mobileNumber = document.getElementById('phone_number').value;
            document.getElementById('mobile_number').value = countryCode + mobileNumber;
        }

        document.getElementById('dropdown-button').addEventListener('click', () => {
            document.getElementById('dropdown-content').classList.toggle('hidden');
        });

        populateCountryCodes();
    </script>

    <!-- Hidden input to hold the full phone number -->
    

    @vite('resources/js/app.js')
</body>
</html>
