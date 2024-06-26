<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    @vite('resources/css/app.css')
</head>

<body class="h-full bg-custom bg-cover bg-center flex items-center justify-center">
    <!-- Back to Home Button -->
    <div class="absolute top-0 left-0 m-4 flex items-center space-x-2 text-white">
        <img src="{{ asset('/assets/images/back.svg') }}" alt="Back button" class="w-12 h-12">
        <span class="opacity-85">Back to home</span>
    </div>

    <!-- Register Form -->
    <div class="flex items-center justify-center max-w-fit h-screen p-4">
        <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img class="h-18 w-auto" src="{{ asset('assets/images/logo.svg') }}" alt="Your Company">
            </div>
            <!-- Register Form -->
            <div >
                <h2 class="text-[14px] font-bold text-left uppercase text-black ">FORGOT PASSWORD</h2>
                <h2 class="text-[12px]  text-black mb-6">Enter your email that associated with your account</h2>

                <form class="space-y-4" action="#" method="POST">

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email"
                            placeholder="Email Address" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:p-2">
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
