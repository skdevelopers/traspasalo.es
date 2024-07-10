<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.shared/title-meta', ['title' => "Login"])

  @include('layouts.shared/head-css')
</head>

<body>

<div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">


  <div class="h-screen w-screen flex justify-center items-center">

    <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
      <div class="card overflow-hidden sm:rounded-md rounded-none">
        <div class="p-6">
          <a href="{{ route('home') }}" class="block mb-8">
            <img class="h-6 block dark:hidden" src="{{ asset('/images/logo-dark.png') }}" alt="dark-logo">
            <img class="h-6 hidden dark:block" src="{{ asset('/images/logo-light.png') }}" alt="light-logo">
          </a>

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                     for="LoggingEmailAddress">Email Address</label>
              <input id="LoggingEmailAddress" class="form-input" type="email"
                     placeholder="Enter your email" value="" name="email">
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                     for="loggingPassword">Password</label>
              <input id="loggingPassword" class="form-input" type="password"
                     placeholder="Enter your password" value="" name="password">
            </div>

            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center">
                <input type="checkbox" class="form-checkbox rounded" id="checkbox-signin">
                <label class="ms-2" for="checkbox-signin">Remember me</label>
              </div>
              <a href="{{ route('auth.recoverpw') }}"
                 class="text-sm text-primary border-b border-dashed border-primary">Forget Password ?</a>
            </div>

            <div class="flex justify-center mb-6">
              <button class="btn w-full text-white bg-primary"> Log In</button>
            </div>
          </form>

          <div class="flex items-center my-6">
            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
            <div class="mx-4 text-secondary">Or</div>
            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
          </div>

          <div class="flex gap-4 justify-center mb-6">
            <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                                <span class="flex justify-center items-center gap-2">
                                    <i class="mgc_github_line text-info text-xl"></i>
                                    <span class="lg:block hidden">Github</span>
                                </span>
            </a>
            <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                                <span class="flex justify-center items-center gap-2">
                                    <i class="mgc_google_line text-danger text-xl"></i>
                                    <span class="lg:block hidden">Google</span>
                                </span>
            </a>
            <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                                <span class="flex justify-center items-center gap-2">
                                    <i class="mgc_facebook_line text-primary text-xl"></i>
                                    <span class="lg:block hidden">Facebook</span>
                                </span>
            </a>
          </div>

          <p class="text-gray-500 dark:text-gray-400 text-center">Don't have an account ?<a
                    href="{{ route('auth.register') }}" class="text-primary ms-1"><b>Register</b></a>
          </p>
        </div>
      </div>
    </div>
  </div>

</div>

</body>

</html>
