<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Page</title>

    @vite('resources/scss/app.scss')
</head>
<body>
    <div class="bg-custom">
        <!-- Back to Home Button -->
        <div class="absolute top-0 left-0 m-4 flex items-center space-x-2 text-white z-10">
            <img src="{{ asset('/front/assets/images/back.svg') }}" alt="Back button" class="w-12 h-12">
            <span class="opacity-85">Back to home</span>
        </div>
    
        <!-- Login Form -->
        <div class="flex items-center justify-center w-full p-4 relative z-10">
            <div class="bg-white rounded-xl p-6 w-full max-w-xs sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm shadow-lg">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <img class="h-18 w-auto" src="{{ asset('front/assets/images/logo.svg') }}" alt="Logo">
                </div>
                <!-- Login Form -->
                <div>
                    <h2 class="text-xl font-bold text-left uppercase text-black mb-6">Login</h2>
                    <form class="space-y-4" action="#" method="POST">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" autocomplete="email" placeholder="Email Address" required
                                   class="block w-full rounded-md border-gray-300 py-1.5 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm placeholder:p-2">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <div class="relative mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Enter Password" required
                                       class="block w-full rounded-md border-gray-300 py-1.5 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm placeholder:p-2">
                                <button type="button" onclick="togglePassword()" aria-label="Toggle Password Visibility"
                                        class="absolute top-0 right-0 p-2 rounded-e-md">
                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-400"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                        <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                                        <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <div class="text-right mt-2">
                                <a href="{{ url('forgot-password') }}" class="text-sm font-semibold text-black hover:text-indigo-500">Forgot password?</a>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-violet-950 hover:bg-violet-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:bg-violet-950">
                                Sign in
                            </button>
                        </div>
                    </form>
                    <p class="mt-6 text-center text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ url('register') }}" class="font-semibold text-black hover:text-indigo-500 underline">Create Account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    
    @vite('resources/js/app.js')
</body>
</html>
