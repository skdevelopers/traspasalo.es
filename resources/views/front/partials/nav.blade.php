<nav class="bg-violet-950 border-violet-900 dark:bg-gray-900 px-4 md:px-20">
    <div class="container xl:container-xl px-0 flex flex-wrap items-center justify-between mx-auto py-2">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center space-x-5 md:space-x-0 rtl:space-x-reverse">
            <img src="{{ asset('/front/assets/images/logo-white.png') }}" class="h-10 md:h-12 xl:h-16" alt="Logo" />
        </a>
        <div class="flex lg:hidden justify-center items-center space-x-3 md:p-3 py-3">

            <!-- Language Dropdown -->
            <div class="relative flex place-content-center place-items-center text-center">
                <button id="languageDropdownButton" type="button"
                    class="flex items-center justify-center w-full rounded-md border border-transparent shadow-sm text-white text-sm font-medium">
                    <!-- Display the selected language -->
                    <svg class="mx-auto h-8 w-8" xmlns="http://www.w3.org/2000/svg" version="1.1"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0"
                        viewBox="0 0 100 100" style="enable-background:new 0 0 512 512" xml:space="preserve">
                        <g>
                            <path
                                d="M87.956 73.232A44.292 44.292 0 0 0 94.5 50.001V50a44.293 44.293 0 0 0-6.544-23.232l-.024-.039a44.502 44.502 0 0 0-75.864 0l-.024.039a44.513 44.513 0 0 0 0 46.464l.025.04a44.502 44.502 0 0 0 75.863-.001ZM55.688 86.873a10.814 10.814 0 0 1-2.89 1.996 6.521 6.521 0 0 1-5.597 0 13.621 13.621 0 0 1-5.048-4.442 39.775 39.775 0 0 1-5.747-12.471q6.79-.418 13.594-.426 6.801 0 13.595.426a50.198 50.198 0 0 1-2.438 6.712 25.803 25.803 0 0 1-5.469 8.205ZM10.587 52.5h17.949a88.305 88.305 0 0 0 1.623 14.914q-7.36.648-14.682 1.78a39.23 39.23 0 0 1-4.89-16.694Zm4.89-21.693q7.319 1.134 14.687 1.78A88.15 88.15 0 0 0 28.538 47.5H10.587a39.23 39.23 0 0 1 4.89-16.693Zm28.835-17.68a10.811 10.811 0 0 1 2.89-1.996 6.521 6.521 0 0 1 5.597 0 13.621 13.621 0 0 1 5.048 4.442 39.775 39.775 0 0 1 5.747 12.471q-6.79.418-13.594.426-6.801 0-13.595-.426a50.19 50.19 0 0 1 2.438-6.712 25.803 25.803 0 0 1 5.469-8.205ZM89.413 47.5H71.464a88.312 88.312 0 0 0-1.623-14.914q7.36-.648 14.682-1.78a39.23 39.23 0 0 1 4.89 16.694ZM35.188 67.025a82.696 82.696 0 0 1-1.65-14.525h32.925a82.678 82.678 0 0 1-1.647 14.526q-7.4-.486-14.816-.496-7.41 0-14.812.495Zm29.624-34.05a82.702 82.702 0 0 1 1.65 14.525H33.538a82.68 82.68 0 0 1 1.647-14.526q7.4.486 14.816.496 7.41 0 14.812-.496Zm6.65 19.525h17.951a39.23 39.23 0 0 1-4.89 16.693q-7.32-1.134-14.687-1.78A88.146 88.146 0 0 0 71.462 52.5Zm10.063-26.295q-6.4.923-12.837 1.462a57.018 57.018 0 0 0-2.975-8.396 35.48 35.48 0 0 0-4.14-7.045 39.492 39.492 0 0 1 19.952 13.979ZM22.07 22.069a39.487 39.487 0 0 1 16.356-9.843c-.094.122-.19.238-.282.361a45.643 45.643 0 0 0-6.822 15.08q-6.438-.545-12.846-1.462a39.825 39.825 0 0 1 3.594-4.136Zm-3.594 51.726q6.399-.923 12.837-1.462a57.018 57.018 0 0 0 2.975 8.396 35.484 35.484 0 0 0 4.14 7.045 39.492 39.492 0 0 1-19.952-13.979Zm59.456 4.136a39.486 39.486 0 0 1-16.356 9.843c.094-.122.19-.238.282-.361a45.643 45.643 0 0 0 6.822-15.08q6.438.545 12.846 1.462a39.825 39.825 0 0 1-3.594 4.136Z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                </button>
                <div id="languageDropdownMenu"
                    class="hidden origin-top-right top-0 absolute right-4 md:right-0 md:transform md:-translate-x-0 mt-10 w-25 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="{{ url('lang/es') }}"
                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-violet-600 hover:text-white"
                            role="menuitem">Español</a>
                        <a href="{{ url('lang/en') }}"
                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-violet-600 hover:text-white"
                            role="menuitem">English</a>
                        <a href="{{ url('lang/ca') }}"
                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-violet-600 hover:text-white"
                            role="menuitem">Catalan</a>
                    </div>
                </div>
            </div>

            @guest
                <div class="relative inline-block text-center">
                    <button id="authDropdownButton" type="button"
                        class="flex items-center justify-items-center w-full rounded-md border border-transparent shadow-sm text-sm font-medium">
                        <svg class="mx-auto h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                    <div id="authDropdownMenu"
                        class="hidden origin-top-right absolute right-4 mt-2 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                        <div class="py-1">
                            <a href="{{ route('register.step1') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-violet-600 hover:text-white">Register</a>
                            <a href="{{ route('auth.login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-violet-600 hover:text-white">Login</a>
                        </div>
                    </div>
                </div>
            @endguest


            @auth
                {{-- <a href="{{ route('home') }}" class="px-6 py-2 bg-orange-500 text-white hover:bg-orange-600 rounded">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-6 py-2 bg-orange-500 text-white hover:bg-orange-600 rounded">Logout</button>
                </form> --}}
                <div class="relative">
                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link">
                        <img src="{{ asset('/images/users/user-6.jpg') }}" alt="user-image" class="rounded-full h-10">
                    </button>
                    <div
                        class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                        <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                            href="#">
                            <span>
                                @if (Auth::check())
                                    <p>Hi, {{ Auth::user()->first_name }}</p>
                                @else
                                    <p>Welcome, Guest!</p>
                                @endif

                            </span>
                        </a>
                        
                            
                            <a href="{{ route('home') }}"
                            class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                            <button type="submit">
                                <i class="mgc_lock_line  me-2"></i>
                                <span>DashBoard</span>
                            </button>
                        </a>
                        
                        {{-- <form method="POST" action="{{ route('lock-screen') }}">
                            @csrf
                            <a
                                class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                <button type="submit">
                                    <i class="mgc_lock_line  me-2"></i>
                                    <span>Lock Screen</span>
                                </button>
                            </a>
                        </form> --}}

                        <hr class="my-2 -mx-2 border-gray-200 dark:border-gray-700">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                <i class="mgc_exit_line  me-2"></i>
                                <span>Log Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            <!-- Language Dropdown -->

            <!-- Mobile menu button -->
            <button type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg lg:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                data-collapse-toggle="navbar-default" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <!-- Navbar links -->
        <div class="hidden w-full lg:flex lg:w-auto items-center" id="navbar-default">
            <ul
                class="flex flex-col lg:flex-row lg:items-center lg:space-x-6 mt-4 lg:mt-0 text-sm lg:text-base text-white space-y-2 lg:space-y-0">
                <li>
                    <a href="{{ url('/') }}"
                        class="block py-2 px-3 hover:bg-violet-600 lg:hover:bg-transparent lg:hover:text-violet-400 rounded ">{{ translate('home') }}</a>
                </li>
                <li>
                    <a href="{{ url('/about') }}"
                        class="block py-2 px-3 hover:bg-violet-600 lg:hover:bg-transparent lg:hover:text-violet-400 rounded">About
                        Us</a>
                </li>
                <li>
                    <a href="{{ url('/newsletter') }}"
                        class="block py-2 px-3 hover:bg-violet-600 lg:hover:bg-transparent lg:hover:text-violet-400 rounded">Newsletter</a>
                </li>
                <li>
                    <a href="{{ url('/price') }}"
                        class="block py-2 px-3 hover:bg-violet-600 lg:hover:bg-transparent lg:hover:text-violet-400 rounded">Pricing</a>
                </li>
                <li>
                    <a href="{{ url('/blog') }}"
                        class="block py-2 px-3 hover:bg-violet-600 lg:hover:bg-transparent lg:hover:text-violet-400 rounded">Blogs</a>
                </li>
                <li class="block lg:hidden">
                    <a href="{{ url('/add-business') }}"
                        class="inline-block text-gray-300 border-2 border-gray-300 rounded px-6 py-2 hover:bg-gray-300 hover:text-violet-950">Add
                        Business</a>
                </li>
            </ul>

            <!-- Right-aligned buttons -->
            <div class="hidden lg:flex justify-center items-center space-x-3 p-3">
                <a href="{{ url('/add-business') }}"
                    class="text-gray-300 border-2 border-gray-300 rounded px-6 py-2 hover:bg-gray-300 hover:text-violet-950">Add
                    Business</a>



                <!-- Language Dropdown -->
                <!-- Language Dropdown -->
                <div class="relative flex place-content-center place-items-center text-center">
                    <button type="button" id="languageDropdownButton1"
                        class="flex items-center justify-center w-full rounded-md border border-transparent shadow-sm text-white text-sm font-medium">
                        <!-- Display the selected language -->
                        <svg class="mx-auto h-8 w-8 relative" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0"
                            viewBox="0 0 100 100" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <path
                                    d="M87.956 73.232A44.292 44.292 0 0 0 94.5 50.001V50a44.293 44.293 0 0 0-6.544-23.232l-.024-.039a44.502 44.502 0 0 0-75.864 0l-.024.039a44.513 44.513 0 0 0 0 46.464l.025.04a44.502 44.502 0 0 0 75.863-.001ZM55.688 86.873a10.814 10.814 0 0 1-2.89 1.996 6.521 6.521 0 0 1-5.597 0 13.621 13.621 0 0 1-5.048-4.442 39.775 39.775 0 0 1-5.747-12.471q6.79-.418 13.594-.426 6.801 0 13.595.426a50.198 50.198 0 0 1-2.438 6.712 25.803 25.803 0 0 1-5.469 8.205ZM10.587 52.5h17.949a88.305 88.305 0 0 0 1.623 14.914q-7.36.648-14.682 1.78a39.23 39.23 0 0 1-4.89-16.694Zm4.89-21.693q7.319 1.134 14.687 1.78A88.15 88.15 0 0 0 28.538 47.5H10.587a39.23 39.23 0 0 1 4.89-16.693Zm28.835-17.68a10.811 10.811 0 0 1 2.89-1.996 6.521 6.521 0 0 1 5.597 0 13.621 13.621 0 0 1 5.048 4.442 39.775 39.775 0 0 1 5.747 12.471q-6.79.418-13.594.426-6.801 0-13.595-.426a50.19 50.19 0 0 1 2.438-6.712 25.803 25.803 0 0 1 5.469-8.205ZM89.413 47.5H71.464a88.312 88.312 0 0 0-1.623-14.914q7.36-.648 14.682-1.78a39.23 39.23 0 0 1 4.89 16.694ZM35.188 67.025a82.696 82.696 0 0 1-1.65-14.525h32.925a82.678 82.678 0 0 1-1.647 14.526q-7.4-.486-14.816-.496-7.41 0-14.812.495Zm29.624-34.05a82.702 82.702 0 0 1 1.65 14.525H33.538a82.68 82.68 0 0 1 1.647-14.526q7.4.486 14.816.496 7.41 0 14.812-.496Zm6.65 19.525h17.951a39.23 39.23 0 0 1-4.89 16.693q-7.32-1.134-14.687-1.78A88.146 88.146 0 0 0 71.462 52.5Zm10.063-26.295q-6.4.923-12.837 1.462a57.018 57.018 0 0 0-2.975-8.396 35.48 35.48 0 0 0-4.14-7.045 39.492 39.492 0 0 1 19.952 13.979ZM22.07 22.069a39.487 39.487 0 0 1 16.356-9.843c-.094.122-.19.238-.282.361a45.643 45.643 0 0 0-6.822 15.08q-6.438-.545-12.846-1.462a39.825 39.825 0 0 1 3.594-4.136Zm-3.594 51.726q6.399-.923 12.837-1.462a57.018 57.018 0 0 0 2.975 8.396 35.484 35.484 0 0 0 4.14 7.045 39.492 39.492 0 0 1-19.952-13.979Zm59.456 4.136a39.486 39.486 0 0 1-16.356 9.843c.094-.122.19-.238.282-.361a45.643 45.643 0 0 0 6.822-15.08q6.438.545 12.846 1.462a39.825 39.825 0 0 1-3.594 4.136Z"
                                    fill="#fff"></path>
                            </g>
                        </svg>
                    </button>
                    <div id="languageDropdownMenu1"
                        class="hidden origin-top-right top-0 absolute right-4 mt-12 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="{{ url('lang/es') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-violet-600 hover:text-white"
                                role="menuitem">Español</a>
                            <a href="{{ url('lang/en') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-violet-600 hover:text-white"
                                role="menuitem">English</a>
                            <a href="{{ url('lang/ca') }}"
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-violet-600 hover:text-white"
                                role="menuitem">Catalan</a>
                        </div>
                    </div>
                </div>






                @guest
                    <!-- Register/Login Dropdown -->
                    <div class="relative inline-block text-left">
                        <button type="button" id="authDropdownButton1"
                            class="flex items-center justify-items-center w-full rounded-md border border-transparent shadow-sm text-sm font-medium">
                            <svg class="mx-auto h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <div id="authDropdownMenu1"
                            class="hidden origin-top-right absolute right-4 mt-2 w-24 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                            <div class="py-1">
                                <a href="{{ route('register.step1') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600">Register</a>
                                <a href="{{ route('auth.login') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600">Login</a>
                            </div>
                        </div>
                    </div>
                @endguest


                @auth
                    <div class="relative">
                        <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link">
                            <img src="{{ asset('/images/users/user-6.jpg') }}" alt="user-image"
                                class="rounded-full h-10">
                        </button>
                        <div
                            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                            <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                href="#">
                                <span>
                                    @if (Auth::check())
                                        <p>Hi, {{ Auth::user()->first_name }}</p>
                                    @else
                                        <p>Welcome, Guest!</p>
                                    @endif

                                </span>
                            </a>

                                <a href="{{  route('home')}}"
                                    class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                    <button type="submit">
                                        <i class="fas fa-tachometer-alt"></i> Dashboard
                                    </button>
                                </a>
                                                        <hr class="my-2 -mx-2 border-gray-200 dark:border-gray-700">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                    <i class="mgc_exit_line  me-2"></i>
                                    <span>Log Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth


            </div>

        </div>
    </div>
</nav>

@push('scripts')
    <script>
        document.querySelector('[data-collapse-toggle]').addEventListener('click', function() {
            const target = document.getElementById(this.getAttribute('data-collapse-toggle'));
            target.classList.toggle('hidden');
        });
    </script>
    <!-- JavaScript for handling dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var languageDropdownButton = document.getElementById('languageDropdownButton');
            var languageDropdownMenu = document.getElementById('languageDropdownMenu');
            var authDropdownButton = document.getElementById('authDropdownButton');
            var authDropdownMenu = document.getElementById('authDropdownMenu');

            languageDropdownButton.addEventListener('click', function() {
                languageDropdownMenu.classList.toggle('hidden');
            });

            authDropdownButton.addEventListener('click', function() {
                authDropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!languageDropdownButton.contains(event.target)) {
                    languageDropdownMenu.classList.add('hidden');
                }
                if (!authDropdownButton.contains(event.target)) {
                    authDropdownMenu.classList.add('hidden');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var languageDropdownButton = document.getElementById('languageDropdownButton1');
            var languageDropdownMenu = document.getElementById('languageDropdownMenu1');
            var authDropdownButton = document.getElementById('authDropdownButton1');
            var authDropdownMenu = document.getElementById('authDropdownMenu1');

            languageDropdownButton.addEventListener('click', function() {
                languageDropdownMenu.classList.toggle('hidden');
            });

            authDropdownButton.addEventListener('click', function() {
                authDropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!languageDropdownButton.contains(event.target)) {
                    languageDropdownMenu.classList.add('hidden');
                }
                if (!authDropdownButton.contains(event.target)) {
                    authDropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
@endpush
