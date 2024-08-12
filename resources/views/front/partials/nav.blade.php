<nav class="bg-violet-950 border-violet-900 dark:bg-gray-900 px-4 md:px-20">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-2">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center space-x-5 rtl:space-x-reverse">
            <img src="{{ asset('/front/assets/images/logo-white.png') }}" class="h-16" alt="Logo" />
        </a>

        <!-- Mobile menu button -->
        <button type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            data-collapse-toggle="navbar-default" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Navbar links -->
        <div class="hidden w-full md:flex md:w-auto items-center" id="navbar-default">
            <ul class="flex flex-col md:flex-row md:items-center md:space-x-6 mt-4 md:mt-0 text-sm md:text-base text-white space-y-2 md:space-y-0">
                <li>
                    <a href="{{ url('/') }}" class="block py-2 px-3 hover:bg-violet-600 md:hover:bg-transparent md:hover:text-violet-400 rounded md:p-0">{{ translate('home') }}</a>
                </li>
                <li>
                    <a href="{{ url('/about') }}" class="block py-2 px-3 hover:bg-violet-600 md:hover:bg-transparent md:hover:text-violet-400 rounded md:p-0">About Us</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 hover:bg-violet-600 md:hover:bg-transparent md:hover:text-violet-400 rounded md:p-0">Newsletter</a>
                </li>
                <li>
                    <a href="{{ url('/price') }}" class="block py-2 px-3 hover:bg-violet-600 md:hover:bg-transparent md:hover:text-violet-400 rounded md:p-0">Pricing</a>
                </li>
                <li>
                    <a href="{{ url('/blogs') }}" class="block py-2 px-3 hover:bg-violet-600 md:hover:bg-transparent md:hover:text-violet-400 rounded md:p-0">Blogs</a>
                </li>
            </ul>

            <!-- Right-aligned buttons -->
            <div class="flex items-center space-x-3 ml-auto p-3">
                <a href="{{ url('/add-business') }}" class="text-gray-300 border-2 border-gray-300 rounded px-6 py-2 hover:bg-gray-300 hover:text-violet-950">Add Business</a>

                @guest
                    <a href="{{ route('register.step1') }}" class="px-6 py-2 bg-orange-500 text-white hover:bg-orange-600 rounded">Register</a>
                    <a href="{{ route('auth.login') }}" class="px-6 py-2 bg-orange-500 text-white hover:bg-orange-600 rounded">Login</a>
                @endguest

                @auth
                    <a href="{{ route('home') }}" class="px-6 py-2 bg-orange-500 text-white hover:bg-orange-600 rounded">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-6 py-2 bg-orange-500 text-white hover:bg-orange-600 rounded">Logout</button>
                    </form>
                @endauth

                <!-- Language Dropdown -->
                <div x-data="{ open: false }" class="relative inline-block text-left md:ml-3">
                    <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-500 text-white text-sm font-medium hover:bg-orange-600 focus:ring-indigo-500">
                        <!-- Display the selected language -->
                        @php
                            $locale = app()->getLocale();
                            $language = $locale === 'es' ? 'ES' : ($locale === 'ca' ? 'CA' : 'EN');
                        @endphp
                        {{ $language }}
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.7-3.7a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" @mouseenter="open = true" @mouseleave="open = false" @click.away="open = false" 
                         class="origin-top-right absolute right-0 md:right-0 md:transform md:-translate-x-0 mt-2 w-25 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" 
                         role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="{{ url('lang/es') }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-purple-600 hover:text-white" role="menuitem">Español</a>
                            <a href="{{ url('lang/en') }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-purple-600 hover:text-white" role="menuitem">English</a>
                            <a href="{{ url('lang/ca') }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-purple-600 hover:text-white" role="menuitem">Catalan</a>
                        </div>
                    </div>
                </div>
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
@endpush
