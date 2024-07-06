
<!-- Navbar -->
<nav class="bg-violet-950 border-violet-900 dark:bg-gray-900 p-2 md:px-20 z-10 relative">
    <div class="container xl:container-xl px-4 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-2">
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
            <ul class="font-thin flex flex-col md:flex-row p-4 md:p-0 mt-4 md:mt-0 md:space-x-8 rtl:space-x-reverse md:items-center
             dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 text-sm">
                <li>
                    <a href="{{ url('/') }}"
                       class="block py-2 px-3 text-white rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                       aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ url('/about') }}"
                       class="block py-2 px-3 text-white rounded hover:bg-violet-600 md:hover:bg-transparent md:border-0
                        md:hover:text-violet-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About
                        Us</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-white rounded hover:bg-violet-600 md:hover:bg-transparent md:border-0
                        md:hover:text-violet-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Newsletter</a>
                </li>
                <li>
                    <a href="{{ url('/price') }}"
                       class="block py-2 px-3 text-white rounded hover:bg-violet-600 md:hover:bg-transparent md:border-0
                        md:hover:text-violet-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="{{ url('/blogs') }}"
                       class="block py-2 px-3 text-white rounded hover:bg-violet-600 md:hover:bg-transparent md:border-0
                        md:hover:text-violet-400 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Blogs</a>
                </li>
                <li class="mt-2 md:mt-0 flex space-x-3 rtl:space-x-reverse">
                    
                    <div x-data="{ open: false }" x-init="$watch('open', value => { if (value) loadContent() })">
                        <!-- Button to open the modal -->
                        <button @click="open = true" class="text-gray-300 px-4 py-2 border-2 border-gray-300 rounded">
                            Add Business
                        </button>
                    
                        <!-- Modal -->
                        <div x-show="open" x-cloak @keydown.escape.window="open = false" class="modal-overlay">
                            <div @click.away="open = false" class="modal-content">
                                <!-- Modal header -->
                                <div class="modal-header flex justify-between items-center p-4 border-b border-gray-200">
                                    <h2 class="text-xl text-violet-950 font-semibold">Add Business</h2>
                                    <button @click="open = false" class="text-violet-950 text-xl font-bold">X</button>
                                </div>
                    
                                <!-- Modal content -->
                                <div id="modal-content" class="modal-body p-4">
                                    <!-- Blade content will be loaded here via AJAX -->
                                </div> 


                                <!-- Modal footer -->
                                <div class="modal-footer flex justify-center p-4 border-t border-gray-200">
                                    <button type="button" class="bg-violet-900 text-white px-10 py-2 opacity-50 rounded mr-2 cursor-not-allowed" disabled>Add Business</button>
                                    <button type="submit" class="bg-white text-gray-700 border-2 border-gray-500 opacity-50 px-10 py-2 rounded cursor-not-allowed" disabled>Save Draft</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                        
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

    function loadContent() {
        
            fetch('/services')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('modal-content').innerHTML = html;
                  //  document.getElementById('modal-content').scrollTop = 0;

                })
                .catch(error => {
                    console.error('Error loading modal content:', error);
                });
        }

</script>
@endpush
