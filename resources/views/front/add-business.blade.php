
@extends('front.layouts.app')

@section('content')
@section('title', translate('Add Business'))
@section('header-title', translate('Add Business'))
@section('header-subtitle', '')

<div class="container mx-auto bg-white px-6 py-10 rounded-lg shadow-md my-10">
    <h3 class="text-2xl font-bold mb-6 text-center text-gray-900">{{ translate('Add New Business') }}</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('business.store') }}" id="business-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">

            <!-- Business Category -->
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="category_id" class="text-lg font-semibold mb-2 text-gray-700">{{ translate('Business Category') }}</label>
                    <select id="category_id" name="category_id"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                        <option value="">{{ translate('Select') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="subcategory_id" class="text-lg font-semibold mb-2 text-gray-700">{{ translate('Sub Category') }}</label>
                    <select id="subcategory_id" name="subcategory_id"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500">
                    </select>
                    <input type="hidden" id="old_subcategory_id" value="{{ old('subcategory_id') }}">
                    @error('subcategory_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Business Title -->
            <div class="mb-4">
                <label for="business_title" class="text-lg font-semibold mb-2 text-gray-700">{{ translate('Business Title') }}</label>
                <input type="text" id="business_title" name="business_title" value="{{ old('business_title') }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500"
                    placeholder="{{ translate('Business title') }}">
                @error('business_title')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="text-lg font-semibold mb-2 text-gray-700">{{ translate('Description') }}</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500"
                    placeholder="{{ translate('Write here...') }}">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Business Number -->
            <div class="mb-4">
                <label for="business_number" class="text-lg font-semibold mb-2 text-gray-700">{{ translate('Add Business Number') }}</label>
                <input type="number" id="business_number" name="phone_no" value="{{ old('phone_no') }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-1 focus:ring-blue-500"
                    placeholder="{{ translate('Add business number') }}">
                @error('phone_no')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Business Location (Map integration) -->
            <div x-data="locationApp()" x-init="initMap()" class="mb-6">
                <div class="mb-4">
                    <label for="autocomplete" class="text-lg font-semibold mb-2 text-gray-700">{{ translate('Business Locations') }}</label>
                    <input type="text" id="autocomplete" name="location" value="{{ old('location') }}"
                        placeholder="{{ translate('Search Location') }}" class="w-full mt-1 p-2 border border-gray-300 rounded">
                </div>
                @error('location')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <div class="mb-4">
                    <label for="map" class="text-lg font-semibold mb-2 text-gray-700">{{ translate('Add On Map') }}</label>
                    <div id="map" class="w-full h-64 bg-gray-200 rounded mt-1"></div>
                </div>
            </div>

            <!-- Business Images Section -->
            <h3 class="text-lg font-semibold mb-2 text-gray-700">{{ translate('Business Images') }}</h3>
            <div id="imageUploadButtons" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @for ($i = 0; $i < 10; $i++)
                    <div class="relative w-[118px] h-[118px] group">
                        <div class="upload-wrapper" id="upload-wrapper-{{ $i }}">
                            <label for="image{{ $i }}" class="block w-28 h-28 border-2 border-dashed border-gray-400 rounded-lg flex items-center justify-center bg-gray-100 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v4H5a1 1 0 100 2h4v4a1 1 0 102 0v-4h4a1 1 0 100-2h-4V5z" clip-rule="evenodd" />
                                </svg>
                            </label>
                            <input type="file" name="images[{{ $i }}]" id="image{{ $i }}" class="hidden file-input" accept="image/*">
                        </div>
                        <div id="preview-container-{{ $i }}" class="absolute inset-0 w-full h-full hidden">
                            <img id="image-preview-{{ $i }}" class="w-[118px] h-[118px] object-cover rounded-lg border border-gray-300" />
                            <button type="button" id="remove-image-{{ $i }}" class="absolute top-1 right-1 text-white bg-red-500 rounded-full w-6 h-6 flex items-center justify-center">&times;</button>
                        </div>
                    </div>
                @endfor
            </div>

            @error('images')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Financials Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">{{ translate('FINANCIALS') }}</h3>
            <table class="min-w-full text-sm text-left text-gray-700">
                <tbody>
                    <tr class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <td class="border px-4 py-2">
                            <label class="text-sm font-semibold mb-1 text-gray-500">Gross Revenue</label>
                            <input type="number" name="financial[gross_revenue]"
                                value="{{ old('financial.gross_revenue') }}"
                                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Gross Revenue">
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-sm font-semibold mb-1 text-gray-500">EBITDA</label>
                            <input type="number" name="financial[ebitda]" value="{{ old('financial.ebitda') }}"
                                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter EBITDA">
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-sm font-semibold mb-1 text-gray-500">Asking Price</label>
                            <input type="number" name="financial[asking_price]"
                                value="{{ old('financial.asking_price') }}"
                                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Asking Price">
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-sm font-semibold mb-1 text-gray-500">FF&E</label>
                            <input type="number" name="financial[ff_and_e]"
                                value="{{ old('financial.ff_and_e') }}"
                                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter FF&E">
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-sm font-semibold mb-1 text-gray-500">Inventory</label>
                            <input type="number" name="financial[inventory]"
                                value="{{ old('financial.inventory') }}"
                                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Inventory">
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-sm font-semibold mb-1 text-gray-500">Established</label>
                            <input type="text" name="financial[established]"
                                value="{{ old('financial.established') }}"
                                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Established Year">
                            @error('financial.established')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Facilities Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">{{ translate('FACILITIES') }}</h3>
            <table class="min-w-full text-left">
                <tbody>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                        <td class="border px-4 py-2">
                            <label class="text-sm font-semibold mb-1 text-gray-500">Rent</label>
                            <input type="number" name="facility[rent]" value="{{ old('facility.rent') }}"
                                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Rent">
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-sm font-semibold mb-1 text-gray-500">Duration (months)</label>
                            <input type="number" name="facility[duration_months]"
                                value="{{ old('facility.duration_months') }}"
                                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Duration in Months">
                        </td>
                        <td class="border px-4 py-2">


                            <!-- Checkboxes for rent_supplies -->
                            <div class="mt-3">
                                <label class="text-sm font-semibold mb-1 text-gray-500">Supplies</label>
                                <div>
                                    <input type="checkbox" name="facility[rent_supplies][]"
                                        value="Air Conditioning"
                                        {{ in_array('Air Conditioning', old('facility.rent_supplies', $facility->rent_supplies ?? [])) ? 'checked' : '' }}>
                                    Air Conditioning
                                </div>
                                <div>
                                    <input type="checkbox" name="facility[rent_supplies][]" value="Gas"
                                        {{ in_array('Gas', old('facility.rent_supplies', $facility->rent_supplies ?? [])) ? 'checked' : '' }}>
                                    Gas
                                </div>
                                <div>
                                    <input type="checkbox" name="facility[rent_supplies][]" value="Electricity"
                                        {{ in_array('Electricity', old('facility.rent_supplies', $facility->rent_supplies ?? [])) ? 'checked' : '' }}>
                                    Electricity
                                </div>
                                <div>
                                    <input type="checkbox" name="facility[rent_supplies][]"
                                        value="3 Phase Electricity"
                                        {{ in_array('3 Phase Electricity', old('facility.rent_supplies', $facility->rent_supplies ?? [])) ? 'checked' : '' }}>
                                    3 Phase Electricity
                                </div>
                            </div>

                        </td>
                    </tr>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <td class="border px-4 py-2">
                            <label for="" class="text-sm font-semibold mb-1 text-gray-500">Property
                                (Price)</label>
                            <input type="number" name="facility[property_price]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Property Price">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="" class="text-sm font-semibold mb-1 text-gray-500">Pending
                                Mortgage</label>
                            <input type="number" name="facility[pending_mortgage]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Pending Mortgage">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="" class="text-sm font-semibold mb-1 text-gray-500">State
                                (Conditions)</label>
                            <input type="text" name="facility[state_conditions]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter State Conditions">
                        </td>
                        <td class="border px-4 py-2">
                            <label for=""
                                class="text-sm font-semibold mb-1 text-gray-500">Supplies</label>
                            <select name="facility[state_supplies]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                <option value="">Select</option>
                                <option value="New"
                                    {{ old('facility.state_supplies') == 'New' ? 'selected' : '' }}>New</option>
                                <option value="Good"
                                    {{ old('facility.state_supplies') == 'Good' ? 'selected' : '' }}>Good</option>
                                <option value="Used"
                                    {{ old('facility.state_supplies') == 'Used' ? 'selected' : '' }}>Used</option>
                                <option value="Acceptable"
                                    {{ old('facility.state_supplies') == 'Acceptable' ? 'selected' : '' }}>
                                    Acceptable
                                </option>
                                <option value="Bad"
                                    {{ old('facility.state_supplies') == 'Bad' ? 'selected' : '' }}>Bad</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- FF&E Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <table class="min-w-full text-left border-collapse">
                <tbody>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <th colspan="3" class="text-lg font-semibold mb-2 text-gray-700">FF&E</th>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <td class="border px-4 py-2">
                            <label for="price_new" class="text-sm font-semibold mb-1 text-gray-500">Price
                                (New)</label>
                            <input type="number" name="FfAndE[price_new]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Price">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="pending_payments" class="text-sm font-semibold mb-1 text-gray-500">Pending
                                Payments</label>
                            <input type="number" name="FfAndE[pending_payments]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Pending Payments">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="year" class="text-sm font-semibold mb-1 text-gray-500">Year</label>
                            <input type="number" name="FfAndE[year]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Year">
                            @error('FfAndE.year')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </td>

                    </tr>

                    <!-- Vehicles Section -->
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <th colspan="3" class="text-lg font-semibold mb-2 text-gray-700 mt-5">Vehicles</th>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <td class="border px-4 py-2">
                            <label for="make_model" class="text-sm font-semibold mb-1 text-gray-500">Make and
                                Model</label>
                            <input type="text" name="vehicle[make_and_model]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Make and Model">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="vehicle_year"
                                class="text-sm font-semibold mb-1 text-gray-500">Year</label>
                            <input type="number" name="vehicle[year]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Year">
                            @error('vehicle.year')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror

                        </td>
                        <td class="border px-4 py-2">
                            <label for="km" class="text-sm font-semibold mb-1 text-gray-500">Km</label>
                            <input type="number" name="vehicle[km]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Km">
                        </td>
                    </tr>

                    <!-- Employees Section -->
                    <tr class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <th colspan="2" class="text-lg font-semibold mb-2 text-gray-700 mt-5">Employees</th>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <td class="border px-4 py-2">
                            <label for="number_employees" class="text-sm font-semibold mb-1 text-gray-500">Number
                                of
                                employees</label>
                            <input type="number" name="business_employee[number_of_employees]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Number of Employees">
                        </td>
                        <td class="border px-4 py-2">
                            <label for="employee_cost" class="text-sm font-semibold mb-1 text-gray-500">Employee
                                cost
                                (company cost)</label>
                            <input type="number" name="business_employee[employee_cost]"
                                class="w-full mt-1 p-2 placeholder:text-base placeholder:text-gray-500 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter Employee Cost">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ translate('Add Business') }}
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function locationApp() {
        return {
            initMap() {
                if (typeof google !== 'undefined' && google.maps) {
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
                        if (!place.geometry) return;

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
                    console.error('Google Maps API is not loaded.');
                }
            },
        };
    }

    function loadGoogleMapsScript(callback) {
        const existingScript = document.querySelector('script[src*="maps.googleapis.com"]');
        if (existingScript) {
            callback();
            return;
        }

        const script = document.createElement('script');
        script.src =
            `https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initMap`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);

        script.onload = callback;
    }

    window.initMap = function() {
        locationApp().initMap();
    }

    document.addEventListener('DOMContentLoaded', function() {
        loadGoogleMapsScript(function() {
            if (window.Alpine) {
                locationApp().initMap();
            } else {
                document.addEventListener('alpine:init', () => {
                    locationApp().initMap();
                });
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category_id');
        const subCategorySelect = document.getElementById('subcategory_id');
        const oldSubcategoryId = document.getElementById('old_subcategory_id').value;

        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;
            subCategorySelect.innerHTML = '<option value="" >Select</option>';

            if (categoryId) {
                axios.get(`/categories/${categoryId}/subcategories`)
                    .then(response => {
                        const subcategories = response.data;
                        subcategories.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;

                            // Check if the old value exists and matches this subcategory
                            if (oldSubcategoryId && subcategory.id == oldSubcategoryId) {
                                option.selected = true; // Preselect the old value
                            }

                            subCategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching subcategories:', error);
                    });
            }
        });

        // Trigger change event if there's an old category selected
        if (categorySelect.value) {
            categorySelect.dispatchEvent(new Event('change'));
        }
    });



    document.addEventListener('DOMContentLoaded', function () {
    const maxImages = 10;

    // Iterate through 10 file input fields
    for (let i = 0; i < maxImages; i++) {
        const fileInput = document.getElementById(`image${i}`);
        const previewContainer = document.getElementById(`preview-container-${i}`);
        const imagePreview = document.getElementById(`image-preview-${i}`);
        const removeButton = document.getElementById(`remove-image-${i}`);
        const uploadWrapper = document.getElementById(`upload-wrapper-${i}`);

        // Handle file selection and preview
        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    previewContainer.classList.remove('hidden'); // Show preview
                    uploadWrapper.classList.add('hidden'); // Hide the upload button
                };
                reader.readAsDataURL(file); // Read the file for preview
            }
        });

        // Handle remove button click
        removeButton.addEventListener('click', function () {
            // Remove the image preview and reset the file input
            fileInput.value = '';
            imagePreview.src = ''; // Clear the image preview
            previewContainer.classList.add('hidden'); // Hide the preview container
            uploadWrapper.classList.remove('hidden'); // Re-show the upload button
        });
    }
});


</script>
@endpush
