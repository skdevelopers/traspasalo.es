<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Page</title>
    <link rel="shortcut icon" href="{{ asset('/images/fav_icon.svg') }}">
    @vite('resources/scss/app.scss')
</head>

<body>

    <div class="bg-custom">
        <!-- Back to Home Button -->
        <div class="absolute top-0 left-0 m-4 flex items-center space-x-2 text-white z-10">
            <a href="{{ url()->previous() }}" class="flex items-center space-x-2">
                <img src="{{ asset('/front/assets/images/back.svg') }}" alt="Back button" class="w-12 h-12"/>
                <span class="opacity-85">Back to home</span>
            </a>
        </div>

        <!-- Register Form -->
        <div class="flex items-center justify-center flex-grow w-full p-4 relative z-10">
            <div class="bg-white rounded-xl p-6 w-full max-w-xs sm:max-w-md lg:max-w-md shadow-lg">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <a href="{{url('/')  }}">
                        <img class="h-12 w-auto sm:h-14 lg:h-18" src="{{ asset('front/assets/images/logo.svg') }}" alt="Your Company">
                        </a>
                </div>
                <!-- Register Form -->
                <div>
                    <h2 class="text-sm sm:text-base lg:text-lg font-bold text-left uppercase text-black mb-6">REGISTER
                        ME&nbsp;|&nbsp;<a href="{{ url('/login') }}"
                            class="underline underline-offset-2 text-indigo-900">Login</a></h2>
                    <div class="flex justify-center w-full">
                        <div class="flex flex-col w-2/3">
                            <div class="flex justify-between mb-1">
                                <span class="text-base font-medium text-blue-700 dark:text-white"></span>
                                <!-- Empty span for spacing -->
                                <span class="text-sm font-medium text-orange-500 dark:text-white">1/2</span>
                            </div>
                            <div class="w-full bg-orange-200 rounded-full h-1 dark:bg-gray-700">
                                <div class="bg-orange-600 h-1 rounded-full" style="width: 50%"></div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register.step1.post') }}">
                        @csrf
                        <div class="max-w-lg mx-auto mt-10 p-2">
                            <div class="flex flex-col sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0">
                                <div class="w-full">
                                    <label for="fname" class="block text-sm font-medium text-gray-700">First
                                        Name</label>
                                    <input id="first_name" name="first_name" type="text" autocomplete="given-name"
                                        placeholder="First Name" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                                    @error('first_name')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="lname" class="block text-sm font-medium text-gray-700">Last
                                        Name</label>
                                    <input id="last_name" name="last_name" type="text" autocomplete="family-name"
                                        placeholder="Last Name" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                                    @error('last_name')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" autocomplete="email"
                                placeholder="Email Address" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                            @error('email')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="p-2">
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-violet-950 hover:bg-violet-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:bg-violet-950">
                                Next
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
