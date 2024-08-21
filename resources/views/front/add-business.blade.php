@extends('front.layouts.app')
<!-- services.blade.php -->
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mx-auto bg-white p-5 rounded-lg shadow-md container xl:container-xl my-10">
        <h3 class="text-center text-3xl p-4"> Add Business</h3>
        <form action="{{ route('business.store') }}" id="business-form" method="POST" enctype="multipart/form-data"
            x-data="featuresForm()">
            @csrf

            <!-- Business Category -->
            <div class="mb-4 flex gap-5">
                <div class="w-1/2">
                    <label for="category_id" class="block text-gray-700">Business Category</label>
                    <select id="category_id" name="category_id"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="sub_category_id" class="block text-gray-700">Sub Category</label>
                    <select id="subcategory_id" name="subcategory_id"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                        <option value="">Select</option>
                        {{-- @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
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
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500"
                    placeholder="Business title">
                @error('business_title')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500"
                    placeholder="Write here..."></textarea>
                @error('description')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Check In and Check Out -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="check_in" class="block text-gray-700">Check In</label>
                    <input type="time" id="check_in" name="check_in"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    @error('check_in')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="check_out" class="block text-gray-700">Check Out</label>
                    <input type="time" id="check_out" name="check_out"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    @error('check_out')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Age Restriction -->
            <div class="mb-4">
                <label for="age_restriction" class="block text-gray-700">Age Restriction</label>
                <select id="age_restriction" name="age_restriction"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    <option value="">Select</option>
                    <option value="0-17">0-17</option>
                    <option value="18-25">18-25</option>
                    <option value="26-40">26-40</option>
                    <option value=">40">&gt;40</option>
                </select>
                @error('age_restriction')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Pets Permission -->
            <div class="mb-4">
                <label for="pets_permission" class="block text-gray-700">Pets Permission</label>
                <select id="pets_permission" name="pets_permission"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    <option value="">Select</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
                @error('pets_permission')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Property Images -->
            <div class="mb-4" x-data="imageUploader()">
                <label for="images" class="block text-gray-700">
                    Add property images*
                    <span x-text="imageCountText" class="text-gray-500 text-sm"></span>
                </label>
                <input type="file" id="imagesInput" accept="image/*" multiple @change="handleFileUpload">
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

            @error('images')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror

            <!-- Property Location (Map integration) -->
            <div x-data="locationApp()" x-init="initMap">
                <div class="mb-4">
                    <label for="autocomplete" class="block text-gray-700 text-sm font-bold mb-2">Property
                        Locations</label>
                    <input type="text" id="autocomplete" name="location" placeholder="Search Location"
                        class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="map" class="block text-gray-700 text-sm font-bold mb-2">Add On Map</label>
                    <div id="map" class="w-full h-64 bg-gray-200 rounded"></div>
                </div>
            </div>

            <!-- Select Features Services -->
            <div class="mb-4">
                <label for="features-services" class="block text-gray-700">Select Features Services</label>
                <div class="flex flex-wrap gap-2">
                    @foreach ($features as $feature)
                        <button type="button"
                            class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none"
                            :class="selectedFeatures.includes({{ $feature->id }}) ? 'bg-purple-500 text-white' :
                                'text-purple-500'"
                            @click="toggleFeature({{ $feature->id }})">
                            {{ $feature->name }} +
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Hidden input to hold selected features -->
            <input type="hidden" name="features[]" id="features" x-model="selectedFeaturesString">
            @foreach ($features as $index => $feature)
                @error('features.' . $index)
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            @endforeach
            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-indigo-900 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    @click="submitForm">
                    Add Business
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
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
                    const map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: -34.397,
                            lng: 150.644
                        },
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
            };
        }

        // Load Google Maps script dynamically with async and defer
        function loadGoogleMapsScript() {
            const script = document.createElement('script');
            script.src =
                `https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initMap`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadGoogleMapsScript();
        });

        window.initMap = function() {
            locationApp().initMap();
        }

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
@endpush
