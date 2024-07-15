<nav class="bg-violet-950 border-violet-900 dark:bg-gray-900 px-4 md:px-20">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-2">
        <a href={{ url('/') }} class="flex items-center space-x-5 rtl:space-x-reverse">
            <img src="{{ asset('/front/assets/images/logo-white.png') }}" class="h-16" alt="Logo" />
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
        <div class="hidden w-full md:flex md:w-auto" id="navbar-default">
            <ul
                class="font-thin flex flex-col md:flex-row p-4 md:p-0 mt-4 md:mt-0 md:space-x-8 rtl:space-x-reverse md:items-center
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
                        <div x-show="open" x-cloak @keydown.escape.window="open = false"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 transition-opacity duration-300"
                            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                            <div @click.away="open = false"
                                class="bg-white rounded-lg shadow-lg w-full max-w-3xl mx-auto p-4 transform transition-transform duration-300"
                                x-transition:enter="transform transition ease-out duration-300"
                                x-transition:enter-start="scale-90" x-transition:enter-end="scale-100"
                                x-transition:leave="transform transition ease-in duration-200"
                                x-transition:leave-start="scale-100" x-transition:leave-end="scale-90">

                                <!-- Modal header -->
                                <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                    <h2 class="text-xl font-semibold text-violet-950">Add Business</h2>
                                    <button @click="open = false" class="text-violet-950 text-xl font-bold">X</button>
                                </div>
                                <!-- Modal content -->
                                <div id="modal-content" class="overflow-y-auto max-h-[75vh] p-4">
                                    <!-- Content will be loaded here via AJAX -->
                                </div>

                                <!-- Modal footer -->
                                <div class="flex justify-center border-t border-gray-200 pt-2 mt-4">
                                    <button type="button"
                                        class="bg-violet-900 text-white px-10 py-2 opacity-50 rounded mr-2 cursor-not-allowed"
                                        disabled>Add Business</button>
                                    <button type="submit"
                                        class="bg-white text-gray-700 border-2 border-gray-500 opacity-50 px-10 py-2 rounded cursor-not-allowed"
                                        disabled>Save Draft</button>
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


        // modal scripting code 
        function loadContent() {
            fetch('/add-business')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('modal-content').innerHTML = html;
                  //  loadCategories();
                    ageRestrictionList();

                })
                .catch(error => {
                    console.error('Error loading modal content:', error);
                });

        }

        // Function to load categories
        // function loadCategories() {
        //     axios.get('/getCategories')
        //         .then(function(response) {
        //             // Log the response to see its structure
        //             //console.log('Response Data:', response.data.categories);

        //             let categories = response.data.categories;

        //             // Select the <select> element
        //             let selectElement = document.getElementById('business-category');

        //             // Clear existing options
        //             selectElement.innerHTML = '';

        //             // Add a default "Select" option
        //             let defaultOption = document.createElement('option');
        //             defaultOption.text = 'Select';
        //             selectElement.appendChild(defaultOption);



        //             // Add options for each category

        //             for (let category in categories) {
        //                 //console.log(categories[category]);
        //                 let option = document.createElement('option');
        //                 option.value = categories[category]; // Set value to category ID
        //                 option.text = category; // Set text to category name
        //                 selectElement.appendChild(option);

        //             }
        //         })
        //         .catch(function(error) {
        //             console.error('There was an error fetching the data!', error);
        //         });
        // }

        function ageRestrictionList() {

            let ageList = [{
                    1: '0-17'
                },
                {
                    2: '18-25'
                },
                {
                    3: '26-40'
                },
                {
                    4: '>40'
                },

            ];

            // Select the <select> element
            let selectElement = document.getElementById('age-restriction');

            // Clear existing options
            selectElement.innerHTML = '';

            // Add a default "Select" option
            let defaultOption = document.createElement('option');
            defaultOption.text = 'Select';
            selectElement.appendChild(defaultOption);

            ageList.forEach(ageObject => {
                
                let option = document.createElement('option');
                let key = Object.keys(ageObject)[0];
                option.value = key; // Set value to category ID
                option.text = ageObject[key]; // Set text to category name
                selectElement.appendChild(option);

            });


        }

        function imageUploader() {
            return {
                files: [],
                handleFileUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.files.push({ url: e.target.result });
                        };
                        reader.readAsDataURL(file);

                        // Clear the input to allow uploading the same file again
                        event.target.value = '';
                    }
                }
            };
        } 
               
                    function locationApp() {
            return {
                initMap() {
                    const map = new google.maps.Map(document.getElementById('map'), {
                        center: { lat: -34.397, lng: 150.644 },
                        zoom: 8
                    });

                    const input = document.getElementById('autocomplete');
                    const autocomplete = new google.maps.places.Autocomplete(input);

                    autocomplete.addListener('place_changed', function() {
                        const place = autocomplete.getPlace();
                        if (!place.geometry) {
                            return;
                        }

                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);
                        }

                        new google.maps.Marker({
                            position: place.geometry.location,
                            map: map
                        });
                    });
                }
            }
        }

        // Load Google Maps script dynamically with async and defer
        const script = document.createElement('script');
        script.src = "https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places";
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);

        window.initMap = function() {
            // Initialize Alpine.js if not already initialized
            if (!window.Alpine) {
                document.addEventListener('alpine:init', () => {
                    locationApp().initMap();
                });
            } else {
                locationApp().initMap();
            }
        }

                </script>
    
@endpush
