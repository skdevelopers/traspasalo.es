@extends('front.layouts.app')
<!-- services.blade.php -->
@section('content')
@section('title', 'Add Business')
@section('header-title', 'Add Business')
@section('header-subtitle', '')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mx-auto bg-white px-4 py-10 rounded-lg shadow-md my-10">
    <form action="">
        @csrf
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-2xl font-semibold mb-6 text-center">Add New Business</h3>
            
            <!-- Business Category -->
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="category_id" class="block text-gray-700">Business Category</label>
                    <select id="category_id" name="category_id"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="subcategory_id" class="block text-gray-700">Sub Category</label>
                    <select id="subcategory_id" name="subcategory_id"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                        <option value="">Select</option>
                    </select>
                    @error('subcategory_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Business Title -->
            <div class="mb-4">
                <label for="business_title" class="block text-gray-700">Business Title</label>
                <input type="text" id="business_title" name="business_title"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500"
                    placeholder="Business title">
                @error('business_title')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500"
                    placeholder="Write here..."></textarea>
                @error('description')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Property Location (Map integration) -->
            <div x-data="locationApp()" x-init="initMap()" class="mb-4">
                <div class="mb-4">
                    <label for="autocomplete" class="block text-gray-700 text-sm font-bold mb-2">Property Locations</label>
                    <input type="text" id="autocomplete" name="location" placeholder="Search Location"
                        class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="map" class="block text-gray-700 text-sm font-bold mb-2">Add On Map</label>
                    <div id="map" class="w-full h-64 bg-gray-200 rounded"></div>
                </div>
            </div>

            <!-- Property Images -->
            <div class="mb-4" x-data="imageUploader()">
                <label for="images" class="block text-gray-700">
                    Add property images* <span x-text="imageCountText" class="text-gray-500 text-sm"></span>
                </label>
                <input type="file" id="imagesInput" accept="image/*" multiple @change="handleFileUpload" class="w-full">
                <div id="imagePreviewContainer" class="flex flex-wrap gap-4 mt-4">
                    <template x-for="(file, index) in files" :key="file.id">
                        <div class="relative inline-block">
                            <img :src="file.url" class="max-w-xs max-h-48 rounded">
                            <button type="button" @click="removeFile(index)"
                                class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full">Remove</button>
                        </div>
                    </template>
                </div>
            </div>
            <!-- Hidden input to store files -->
            <input type="file" id="hiddenImagesInput" name="images[]" multiple style="display: none;">
        </div>

        <!-- Financials Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">FINANCIALS</h3>
            <table class="min-w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                    <tr>
                        <th class="border-b px-4 py-2">Gross Revenue</th>
                        <th class="border-b px-4 py-2">EBITDA</th>
                        <th class="border-b px-4 py-2">Asking Price</th>
                        <th class="border-b px-4 py-2">FF&E</th>
                        <th class="border-b px-4 py-2">Inventory</th>
                        <th class="border-b px-4 py-2">Established</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">
                            <input type="number" name="gross_revenue"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Gross Revenue">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" name="ebitda"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter EBITDA">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" name="asking_price"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Asking Price">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" name="ffe"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter FF&E">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" name="inventory"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Inventory">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="text" name="established"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Established Year">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Facilities Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">FACILITIES</h3>
            <table class="min-w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <th class="border-b px-4 py-2">Rent</th>
                        <th class="border-b px-4 py-2">Duration (months)</th>
                        <th class="border-b px-4 py-2">Supplies</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <td class="border px-4 py-2">
                            <input type="number" name="rent"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Rent">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" name="duration"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Duration in Months">
                        </td>
                        <td class="border px-4 py-2">
                            <select name="supplies"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <th class="border-b px-4 py-2">Property (Price)</th>
                        <th class="border-b px-4 py-2">Pending Mortgage</th>
                        <th class="border-b px-4 py-2">State (Conditions)</th>
                        <th class="border-b px-4 py-2">Supplies</th>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <td class="border px-4 py-2">
                            <input type="number" name="property_price"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Property Price">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" name="pending_mortgage"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Pending Mortgage">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="text" name="state_conditions"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter State Conditions">
                        </td>
                        <td class="border px-4 py-2">
                            <select name="supplies"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- FF&E Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <table class="min-w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <th colspan="3" class="border-b px-4 py-2 text-left text-lg font-semibold">FF&E</th>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <td class="border px-4 py-2">
                            <label for="price_new" class="block text-gray-700">Price (New)</label>
                            <input type="number" name="price_new"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Price">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="pending_payments" class="block text-gray-700">Pending Payments</label>
                            <input type="number" name="pending_payments"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Pending Payments">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="year" class="block text-gray-700">Year</label>
                            <input type="number" name="year"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Year">
                        </td>
                    </tr>

                    <!-- Vehicles Section -->
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <th colspan="3" class="border-b px-4 py-2 text-left text-lg font-semibold">Vehicles</th>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <td class="border px-4 py-2">
                            <label for="make_model" class="block text-gray-700">Make and Model</label>
                            <input type="text" name="make_model"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Make and Model">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="vehicle_year" class="block text-gray-700">Year</label>
                            <input type="number" name="vehicle_year"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Year">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="km" class="block text-gray-700">Km</label>
                            <input type="number" name="km"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Km">
                        </td>
                    </tr>

                    <!-- Employees Section -->
                    <tr class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <th colspan="2" class="border-b px-4 py-2 text-left text-lg font-semibold">Employees</th>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <td class="border px-4 py-2">
                            <label for="number_employees" class="block text-gray-700">Number of employees</label>
                            <input type="number" name="number_employees"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Number of Employees">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="employee_cost" class="block text-gray-700">Employee cost (company cost)</label>
                            <input type="number" name="employee_cost"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Employee Cost">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Features Services Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">Features Services</h3>
            <div class="flex flex-wrap gap-2">
                @foreach ($features as $feature)
                    <button type="button"
                        class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none"
                        :class="selectedFeatures.includes({{ $feature->id }}) ? 'bg-purple-500 text-white' : 'text-purple-500'"
                        @click="toggleFeature({{ $feature->id }})">
                        {{ $feature->name }} +
                    </button>
                @endforeach
            </div>
        </div>
        <!-- Hidden input to hold selected features -->
        <input type="hidden" name="features[]" id="features" x-model="selectedFeaturesString">

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                @click="submitForm">
                Add Business
            </button>
        </div>
    </form>
</div>

@endsection



@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category_id');
        const subCategorySelect = document.getElementById('subcategory_id');

        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;

            // Clear previous subcategories
            subCategorySelect.innerHTML = '<option value="">Select</option>';

            if (categoryId) {
                // Fetch subcategories for the selected category
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
                        console.error('Error fetching subcategories:', error);
                    });
            }
        });
    });
</script>
<script>
    function imageUploader() {
        return {
            files: [],
            fileId: 0,
            get imageCountText() {
                return `(${this.files.length}/10)`;
            },
            handleFileUpload(event) {
                const selectedFiles = Array.from(event.target.files);

                // Prevent uploading more than 10 images
                if (this.files.length + selectedFiles.length > 10) {
                    alert('You can upload a maximum of 10 images.');
                    return;
                }

                selectedFiles.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const fileId = this.fileId++;
                        this.files.push({
                            id: fileId,
                            url: e.target.result,
                            name: file.name,
                            file: file
                        });

                        // Update the hidden input field with file data
                        this.updateHiddenInput();
                    };
                    reader.readAsDataURL(file);
                });

                // Clear the input to allow uploading the same file again
                event.target.value = '';
            },
            removeFile(index) {
                this.files.splice(index, 1);
                // Update the hidden input field after removing a file
                this.updateHiddenInput();
            },
            updateHiddenInput() {
                const dataTransfer = new DataTransfer();
                this.files.forEach(file => {
                    dataTransfer.items.add(file.file);
                });
                // console.log(this.files);
                // Update the hidden input element
                const inputElement = document.getElementById('hiddenImagesInput');
                inputElement.files = dataTransfer.files;
            }
        };
    }

    function locationApp() {
        return {
            initMap() {
                if (typeof google !== 'undefined') {
                    const map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: -34.397,
                            lng: 150.644
                        },
                        zoom: 8,
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
                            map: map,
                        });
                    });
                } else {
                    console.error("Google Maps is not loaded yet");
                }
            }
        };
    }

    // Function to load Google Maps script
    function loadGoogleMapsScript() {
        const script = document.createElement('script');
        script.src =
            `https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initMap`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    }

    // Load the script on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', function() {
        loadGoogleMapsScript();
    });

    // Make initMap available in the global scope
    window.initMap = function() {
        locationApp().initMap();
    };

    function featuresForm() {
        return {
            selectedFeatures: [],
            toggleFeature(featureId) {
                if (this.selectedFeatures.includes(featureId)) {
                    this.selectedFeatures = this.selectedFeatures.filter(id => id !== featureId);
                } else {
                    this.selectedFeatures.push(featureId);
                }
            },
            get selectedFeaturesString() {
                return this.selectedFeatures.join(',');
            }
        };
    }
</script>
@endpush
