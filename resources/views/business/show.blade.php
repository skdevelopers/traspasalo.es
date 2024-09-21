@extends('front.layouts.app')
@section('content')
@section('title', 'Business Details')
@section('header-title', 'Business Details')
@section('header-subtitle', '')

<div class="container mx-auto bg-white px-4 py-10 rounded-lg shadow-md my-10">
    <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
        <h3 class="text-2xl font-bold mb-6 text-center">{{ $business->business_title }}</h3>

        <!-- Property Location (Map integration) -->
        <div class="mb-4">
            <label class="text-lg font-bold mb-2 text-gray-700">Business Images</label>
            <!-- Map Display -->
            <div class="w-full h-80 bg-gray-200 rounded overflow-hidden mt-4">
                <img src="{{ $business->category->getImageUrlAttribute() }}"
                     class="w-full h-full object-cover">
            </div>
            
            
        <!-- Business Images -->
        <div class="grid grid-cols-6 gap-2 p-2">
            @if (!empty($media && $showPaidFeatures))
                @foreach ($media as $image)
                    <div class="w-full h-[118px] bg-gray-100 rounded-lg overflow-hidden">
                        <img src="{{ $image['org_url'] }}"
                            class="w-full h-full object-cover rounded-lg border border-gray-300 cursor-pointer"
                            alt="Business Image"
                            onclick="openModal('{{ $image['org_url'] }}')">
                    </div>
                @endforeach
            @else
            <div class="grid-cols-1">
                <p class="text-red-500 text-sm p-2">Images are Paid Features.</p>
                <a href="{{ route('price') }}" class="bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded">
                    Purchase a Plan
                </a>
            </div>
            @endif
        </div>
                    
        
        <!-- Fullscreen Modal for Image Preview -->
        <div id="imageModal" class="fixed inset-0 hidden z-50 flex items-center justify-center">
            <!-- Overlay with Blur Effect and Dark Background -->
            <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-filter backdrop-blur-sm"></div>
            
            <!-- Image and Close Button Container -->
            <div class="relative">
                <!-- Close Button on top-right of the image -->
                <span class="absolute top-2 right-2 text-white text-3xl cursor-pointer" onclick="closeModal()">&times;</span>
                
                <!-- Image displayed in the center with a fixed size -->
                <img id="modalImage" class="max-w-[50vw] max-h-[50vh] object-contain rounded-lg">
            </div>
        </div>

        </div>
        <!-- Business Category and Subcategory -->
        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="text-lg font-bold mb-2 text-gray-700">Business Category</label>
                <p class="text-sm text-gray-800">{{ $business->category->name ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-lg font-bold mb-2 text-gray-700">Sub Category</label>
                <p class="text-sm text-gray-800">{{ $business->subcategory->name ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Business Title -->
        <div class="mb-4">
            <label class="text-lg font-bold mb-2 text-gray-700">Business Title</label>
            <p class="text-sm text-gray-800">{{ $business->business_title }}</p>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="text-lg font-bold mb-2 text-gray-700">Description</label>
            <p class="text-sm text-gray-800">{{ $business->description }}</p>
        </div>
        <div class="mb-4">
            <label class="text-lg font-bold mb-2 text-gray-700">Phone Number</label>
            @if ($showPaidFeatures)
            <p class="text-sm text-gray-800">{{ $business->phone_no }}</p>
        @else
            <p class="text-red-500 text-sm p-2">Phone number is a paid feature.</p>
            <a href="{{ route('price') }}" class="bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded">
                Purchase a Plan
            </a>
        @endif
        </div>

        <!-- Property Location (Map integration) -->
        <div class="mb-4">
            <label class="text-lg font-bold mb-2 text-gray-700">Location</label>
            <p class="text-sm text-gray-800">{{ $business->location }}</p>
            <!-- Map Display -->
            <div id="map" class="w-full h-64 bg-gray-200 rounded mt-4"></div>
        </div>

          

        <!-- Financials Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-base font-semibold mb-1 text-gray-700">Financials</h3>
            <table class="min-w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                    <tr class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Gross Revenue</label>
                            <p class="text-sm text-gray-800">{{ $business->financial->gross_revenue ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">EBITDA</label>
                            <p class="text-sm text-gray-800">{{ $business->financial->ebitda ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Asking Price</label>
                            <p class="text-sm text-gray-800">{{ $business->financial->asking_price ?? 'N/A' }}</p>
                        </td>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">FF&E</label>
                            <p class="text-sm text-gray-800">{{ $business->financial->ffe ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Inventory</label>
                            <p class="text-sm text-gray-800">{{ $business->financial->inventory ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Established</label>
                            <p class="text-sm text-gray-800">{{ $business->financial->established ?? 'N/A' }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Facilities Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-base font-semibold mb-1 text-gray-700">Facilities</h3>
            <table class="min-w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                    <tr class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Rent</label>
                            <p class="text-sm text-gray-800">{{ $business->facility->rent ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Duration (months)</label>
                            <p class="text-sm text-gray-800">{{ $business->facility->duration_months ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Supplies</label>
                            @if(!empty($business->facility->rent_supplies) && is_array($business->facility->rent_supplies))
                                <ul class="text-sm text-gray-800">
                                    @foreach($business->facility->rent_supplies as $supply)
                                        <li>{{ $supply }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-gray-800">N/A</p>
                            @endif
                        </td>
                        
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Property (Price)</label>
                            <p class="text-sm text-gray-800">{{ $business->facility->property_price ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Pending Mortgage</label>
                            <p class="text-sm text-gray-800">{{ $business->facility->pending_mortgage ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">State (Conditions)</label>
                            <p class="text-sm text-gray-800">{{ $business->facility->state_conditions ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="text-lg font-bold mb-2 text-gray-700">Supplies</label>
                            <p class="text-sm text-gray-800">{{ $business->facility->state_supplies ?? 'N/A' }}</p>
                        </td>
                    </tr>
                    <!-- Add more rows for other facility fields as needed -->
                </tbody>
            </table>
        </div>

        <!-- FF&E Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">FF&E</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border px-4 py-2">
                    <label class="text-lg font-bold mb-2 text-gray-700">Price (New)</label>
                    <p class="text-sm text-gray-800">{{ $business->ffAndE->price_new ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="text-lg font-bold mb-2 text-gray-700">Pending Payments</label>
                    <p class="text-sm text-gray-800">{{ $business->ffAndE->pending_payments ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="text-lg font-bold mb-2 text-gray-700">Year</label>
                    <p class="text-sm text-gray-800">{{ $business->ffAndE->year ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Vehicles Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">Vehicles</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border px-4 py-2">
                    <label class="text-lg font-bold mb-2 text-gray-700">Make and Model</label>
                    <p class="text-sm text-gray-800">{{ $business->vehicle->make_and_model ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="text-lg font-bold mb-2 text-gray-700">Year</label>
                    <p class="text-sm text-gray-800">{{ $business->vehicle->year ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="text-lg font-bold mb-2 text-gray-700">Km</label>
                    <p class="text-sm text-gray-800">{{ $business->vehicle->km ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Employees Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">Employees</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border px-4 py-2">
                    <label class="text-lg font-bold mb-2 text-gray-700">Number of Employees</label>
                    <p class="text-sm text-gray-800">{{ $business->businessEmployee->number_of_employees ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="text-lg font-bold mb-2 text-gray-700">Employee Cost (Company Cost)</label>
                    <p class="text-sm text-gray-800">{{ $business->businessEmployee->employee_cost ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Features Services Section -->
        {{-- <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">Features Services</h3>
            <div class="flex flex-wrap gap-2">
                @foreach ($business->features as $feature)
                    <span
                        class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full">{{ $feature->name }}</span>
                @endforeach
            </div>
        </div> --}}

        <!-- QR Code Section (Optional) -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">QR Code</h3>
            @if ($business->qr_code_path && $showPaidFeatures)
                <img src="{{ $business->getQrCodeUrl() }}" alt="QR Code" class="w-32 h-32 object-contain">
            @else
                <p class="text-sm text-red-500 p-2">QR code is a Paid Feature.</p>
                <a href="{{ route('price') }}" class="bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded">
                    Purchase a Plan
                </a>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Function to load Google Maps script
    function loadGoogleMapsScript(callback) {
        const existingScript = document.querySelector('script[src*="maps.googleapis.com"]');
        if (existingScript) {
            callback(); // Script already loaded, call the callback immediately
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

    // Initialize the map with geocoding for the string location
    function initMap() {
        const geocoder = new google.maps.Geocoder();
        const address = "{{ $business->location }}"; // Get the location as a string

        // Geocode the address
        geocoder.geocode({ address: address }, function(results, status) {
            if (status === 'OK') {
                // Create the map and center it on the geocoded location
                const map = new google.maps.Map(document.getElementById('map'), {
                    center: results[0].geometry.location,
                    zoom: 17,
                });

                // Add a marker at the geocoded location
                new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map,
                });
            } else {
                // Handle the case when geocoding fails
                console.error('Geocode was not successful for the following reason: ' + status);
                document.getElementById('map').innerHTML = `<p class="text-red-600">Unable to load map: ${status}</p>`;
            }
        });
    }

    // Load the Google Maps script when the DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        loadGoogleMapsScript(function() {
            window.initMap();
        });
    });


    function openModal(imageUrl) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    
    modalImage.src = imageUrl;
    modal.classList.remove('hidden');
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
}


</script>
@endpush
