@extends('front.layouts.app')

@section('title', 'Businesses')
@section('header-title', 'Businesses')
@section('header-subtitle', '')

@section('content')

    <div class="p-4 md:p-10 shadow-md">
        <form method="GET" action="/businesses"
            class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0 overflow-x-auto">
            @if (!request()->is('businesses/location'))
                <input type="text" name="keyword" placeholder="Keyword" class="w-full p-2 border border-gray-300 rounded-lg"
                    value="{{ request('keyword') }}">
                <select id="category_id" name="category_id" class="w-full p-2 border border-gray-300 rounded-lg"
                    value="{{ request('category_id') }}"></select>
                <select id="subcategory_id" name="subcategory_id" class="w-full p-2 border border-gray-300 rounded-lg"
                    value="{{ request('subcategory_id') }}">
                    <option value="">Sub Type</option>
                </select>
            @endif
            <input type="text" id="autocomplete" name="location" placeholder="Location"
                class="w-full p-2 border border-gray-300 rounded-lg" value="{{ request('location') }}">
            <button type="submit" class="p-2 bg-violet-900 text-white rounded-lg">Search</button>
        </form>
    </div>

    <div class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 overflow-x-auto">
        @forelse($businesses as $business)
            <div class="bg-white p-4 rounded-lg shadow-md max-w-full">
                <div class="mb-4">
                    <img src="{{ $business->getImageUrl() }}" alt="{{ $business->business_title }}"
                        class="w-full h-48 object-cover rounded-lg">
                </div>
                <h3 class="text-lg font-bold mb-2"><a
                        href="{{ route('business.show', $business->id) }}">{{ $business->business_title }}</a></h3>
                <p class="text-gray-700 mb-2">{{ $business->description }}</p>
                <p class="text-gray-500">{{ $business->location }}</p>
                <p class="text-gray-500">Status: {{ ucfirst($business->status) }}</p>
                <p class="text-gray-500">250 €</p>
                <div class="mt-4">
                    @if ($business->getQrCodeUrl())
                        <img src="{{ $business->getQrCodeUrl() }}" alt="QR Code" width="50">
                    @else
                        No QR Code
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">No Business Found</div>
        @endforelse
    </div>

@endsection

@push('scripts')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the current URL path
    const currentPath = window.location.pathname;

    // Check if the current path is NOT '/businesses/location'
    if (currentPath !== '/businesses/location') {
        // Your original script here

        axios.get('/getCategories')
            .then(function(response) {
                if (response.data.status === 1) {
                    var categories = response.data.categories;
                    var categorySelect = document.getElementById('category_id');
                    categorySelect.innerHTML = '<option value="">Business Type</option>';
                    for (var name in categories) {
                        var option = document.createElement('option');
                        option.value = name;
                        option.textContent = categories[name];
                        categorySelect.appendChild(option);
                    }
                }
            })
            .catch(function(error) {
                // Handle errors here if necessary
                // console.error('Error fetching categories:', error);
            });

        const categorySelect = document.getElementById('category_id');
        const subCategorySelect = document.getElementById('subcategory_id');

        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;

            subCategorySelect.innerHTML = '<option value="">Sub Type</option>';

            if (categoryId) {
                axios.get(`/categories/${categoryId}/subcategories`)
                    .then(response => {
                        const subcategories = response.data;
                        subcategories.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subCategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        // Handle errors here if necessary
                        // console.error('Error fetching subcategories:', error);
                    });
            }
        });
    }
});




        function loadGoogleMapsScript(callback) {
            const existingScript = document.getElementById('googleMaps');
            const googleMapsApiKey = "{{ config('services.google_maps.key') }}";
            if (!existingScript) {
                const script = document.createElement('script');
                script.src =
                    `https://maps.googleapis.com/maps/api/js?key=${googleMapsApiKey}&libraries=places&callback=${callback}`;
                script.id = 'googleMaps';
                script.async = true;
                script.defer = true;
                document.head.appendChild(script);
            } else if (existingScript && typeof google !== 'undefined') {
                // If script is already loaded and Google object is available
                if (callback) {
                    window[callback]();
                }
            }
        }

        function initAutocomplete() {
            var input = document.getElementById('autocomplete');
            if (input && typeof google !== 'undefined') {
                var autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.addListener('place_changed', function() {
                    var place = autocomplete.getPlace();
                    console.log(place); // This will log the entire place object, including the formatted address.
                });
            }
        }

        document.getElementById('autocomplete').addEventListener('focus', function() {
            loadGoogleMapsScript('initAutocomplete');
        });



        const originalWarn = console.warn;

        // Override the console.warn function
        console.warn = function(message) {
            if (message.includes('Google Maps JavaScript API has been loaded directly')) {
                // Ignore this specific warning
                return;
            }

            // Call the original console.warn for other warnings
            originalWarn.apply(console, arguments);
        };
    </script>
@endpush
