<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    @vite('resources/scss/app.scss')
</head>

<body>
    <div class="bg-custom">
        <!-- Back to Home Button -->
        <div class="absolute top-0 left-0 m-4 flex items-center space-x-2 text-white z-10">
            <a href="{{ url()->previous() }}" class="flex items-center space-x-2">
                <img src="{{ asset('/front/assets/images/back.svg') }}" alt="Back button" class="w-12 h-12" />
                <span>Back to home</span>
            </a>
        </div>

        <!-- Register Form -->
        <div class="flex items-center justify-center w-full p-4 relative z-10">
            <div class="bg-white rounded-xl p-6 w-full max-w-xs sm:max-w-sm md:max-w-sm lg:max-w-sm shadow-lg">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <img class="h-12 sm:h-14 md:h-16 lg:h-18 w-auto" src="{{ asset('front/assets/images/logo.svg') }}"
                        alt="Your Company">
                </div>
                <!-- Register Form -->
                <div>
                    <h2 class="text-sm sm:text-base md:text-lg font-bold text-left uppercase text-black">RESET PASSWORD
                    </h2>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <div class="p-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input id="password" name="password" type="password" autocomplete="given-name"
                                    placeholder="Password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                                @error('password')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="p-2">
                            <label for="c_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="family-name"
                                    placeholder="Confirm Password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                                @error('password_confirmation')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="p-2">
                            <button type="submit"
                                class="w-full flex justify-center p-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Reset Password
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
