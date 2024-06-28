<nav class="bg-violet-950 border-violet-900 dark:bg-gray-900 px-4 md:px-20">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-2">
        <a href="#" class="flex items-center space-x-5 rtl:space-x-reverse">
            <img src="{{ asset('/assets/images/logo-white.png') }}" class="h-16" alt="Logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:flex md:w-auto" id="navbar-default" >
            <ul class="font-thin flex flex-col md:flex-row p-4 md:p-0 mt-4 md:mt-0 md:space-x-8 rtl:space-x-reverse md:items-center dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 text-sm">
                <li>
                    <a href="{{ url('/') }}"
                       class="block py-2 px-3 text-white rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                       aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-white rounded hover:bg-violet-600 md:hover:bg-transparent md:border-0 md:hover:text-violet-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About
                        Us</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-white rounded hover:bg-violet-600 md:hover:bg-transparent md:border-0 md:hover:text-violet-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Newsletter</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-white rounded hover:bg-violet-600 md:hover:bg-transparent md:border-0 md:hover:text-violet-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-white rounded hover:bg-violet-600 md:hover:bg-transparent md:border-0 md:hover:text-violet-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Blogs</a>
                </li>
                <li class="mt-2 md:mt-0 flex space-x-3 rtl:space-x-reverse">
                    <a href="{{ url('/add-property') }}" class="flex">
                        <button class="px-4 py-2 font-thin border-2 border-white text-white hover:bg-purple-700 rounded">
                           Add Property
                        </button>
                    </a>
                    <a href="{{ url('/register') }}" class="flex">
                        <button class="px-6 py-2 bg-orange-500 text-white hover:bg-orange-600 rounded">
                           Register
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.querySelector('[data-collapse-toggle]').addEventListener('click', function() {
        const target = document.getElementById(this.getAttribute('data-collapse-toggle'));
        if (target) {
            target.classList.toggle('hidden');
        }
    });
</script>
@endpush
