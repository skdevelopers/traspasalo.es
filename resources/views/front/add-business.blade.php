<!-- services.blade.php -->
<div class="mx-auto bg-white p-4 rounded-lg shadow-md">

    <form method="" action="" id="business-form">
        <!-- Business Category -->
        <div class="mb-4">
            <label for="business-category" class="block text-gray-700">Business Category</label>
            <select id="category_id" name="category_id"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option>Select</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                <!-- Options will be dynamically added here -->
            </select>
        </div>

        <!-- Business Title -->
        <div class="mb-4">
            <label for="business-title" class="block text-gray-700">Business Title</label>
            <input type="text" id="business-title"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500"
                placeholder="Business title">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" rows="4"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500"
                placeholder="Write here..."></textarea>
        </div>

        <!-- Check In and Check Out -->
        <div class="mb-4 flex space-x-4">
            <div class="w-1/2">
                <label for="check-in" class="block text-gray-700">Check In</label>
                <select id="check-in"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    <option>Check in time</option>
                    <!-- Add your options here -->
                </select>
            </div>
            <div class="w-1/2">
                <label for="check-out" class="block text-gray-700">Check Out</label>
                <select id="check-out"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    <option>Checkout time</option>
                    <!-- Add your options here -->
                </select>
            </div>
        </div>

        <!-- Age Restriction -->
        <div class="mb-4">
            <label for="age-restriction" class="block text-gray-700">Age Restriction</label>
            <select id="age-restriction"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option>Select</option>
                <!-- Add your options here -->
            </select>
        </div>

        <!-- Pets Permission -->
        <div class="mb-4">
            <label for="pets-permission" class="block text-gray-700">Pets Permission</label>
            <select id="pets-permission"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option>Select</option>
                <option value="1">YES</option>
                <option value="0">NO</option>
                <!-- Add your options here -->
            </select>
        </div>

        <!-- Add Property Images -->
        <!-- Add Property Images -->
        <div class="mb-4">
            <label for="property-images" class="block text-gray-700">Add property images* <span
                    class="text-gray-500 text-sm">(0/10)</span></label>
            <div x-data="imageUploader">
                <input type="file" id="imageInput" accept="image/*" @change="handleFileUpload" class="mb-4 p-2 border border-gray-300 rounded" multiple>
                <div id="imagePreviewContainer" class="flex flex-wrap gap-4">
                    <template x-for="(file, index) in files" :key="index">
                        <div class="relative inline-block">
                            <img :src="file.url" class="max-w-xs max-h-48 rounded">
                            <button @click="files.splice(index, 1)" class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full">Remove</button>
                        </div>
                    </template>
                </div>
            </div>
        </div>


        <!-- Property Location -->
        {{-- <div class="mb-4">
            <label for="property-location" class="block text-gray-700">Property Location</label>
            <input type="text" id="address"
                class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500"
                placeholder="Search Location">
        </div> --}}

        <h1 class="text-2xl font-bold mb-4">Property Location</h1>
    <div x-data="locationApp()" x-init="initMap">
        <div class="mb-4">
            <label for="autocomplete" class="block text-gray-700 text-sm font-bold mb-2">Search Location</label>
            <input type="text" id="autocomplete" placeholder="Search Location" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <h2 class="text-xl font-bold mb-4">Add On Map</h2>
        <div id="map" class="w-full h-64 bg-gray-200 rounded"></div>
    </div>
        {{-- <!-- Add On Map -->
        <div class="mb-4">
            <label class="block text-gray-700">Add On Map</label>
            <div class="w-full h-64 bg-gray-200 rounded-md overflow-hidden">
                <!-- Placeholder for map. Replace with actual map implementation -->
                {{-- <img src={{ asset('/front/assets/images/passenger-plane-airport-near-terminal-stands-concept-flight-airport-vacation.svg') }}
                    alt="Map placeholder" class="w-auto h-full  object-cover"> --}}
                {{-- <div id="map">
                </div>
        </div>
    </div> --}} 
        <!-- Select Features Services -->
        <div class="mb-4">
            <label for="features-services" class="block text-gray-700">Select Features Services</label>
            <div class="flex flex-wrap gap-2">
                <!-- Feature buttons -->
                @foreach ($features_services as $feature)
                    <button type="button" name="features_services[]" value="{{ $feature->id }}"
                        class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                        {{ $feature->name }} +
                    </button>
                @endforeach
                <!-- Add more buttons as needed -->
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    
</script>
@endpush
