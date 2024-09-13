@extends('front.layouts.app')
@section('content')
@section('title', 'Business Details')
@section('header-title', 'Business Details')
@section('header-subtitle', '')

<div class="container mx-auto bg-white px-4 py-10 rounded-lg shadow-md my-10">
    <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
        <h3 class="text-2xl font-semibold mb-6 text-center">{{ $business->business_title }}</h3>

        <!-- Business Category and Subcategory -->
        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-base font-semibold mb-1 text-gray-700">Business Category</label>
                <p class="text-lg text-gray-800">{{ $business->category->name ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="block text-base font-semibold mb-1 text-gray-700">Sub Category</label>
                <p class="text-lg text-gray-800">{{ $business->subcategory->name ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Business Title -->
        <div class="mb-4">
            <label class="block text-base font-semibold mb-1 text-gray-700">Business Title</label>
            <p class="text-lg text-gray-800">{{ $business->business_title }}</p>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-base font-semibold mb-1 text-gray-700">Description</label>
            <p class="text-lg text-gray-800">{{ $business->description }}</p>
        </div>

        <!-- Property Location (Map integration) -->
        <div class="mb-4">
            <label class="block text-base font-semibold mb-1 text-gray-700">Location</label>
            <p class="text-lg text-gray-800">{{ $business->location }}</p>
            <!-- Map Display -->
            <div id="map" class="w-full h-64 bg-gray-200 rounded mt-4"></div>
        </div>

        <!-- Business Images -->
        @if (!empty($business->images) && $business->images->count())
            @foreach ($business->images as $image)
                <img src="{{ $image->url }}"
                    class="w-[118px] h-[118px] object-cover rounded-lg border border-gray-300" alt="Business Image">
            @endforeach
        @else
            <p>No images available for this business.</p>
        @endif


        <!-- Financials Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-base font-semibold mb-1 text-gray-700">Financials</h3>
            <table class="min-w-full text-sm text-left text-gray-700 border-collapse">
                <tbody>
                    <tr class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <td class="border px-4 py-2">
                            <label class="block text-base font-semibold mb-1 text-gray-700">Gross Revenue</label>
                            <p class="text-lg text-gray-800">{{ $business->financial->gross_revenue ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="block text-base font-semibold mb-1 text-gray-700">EBITDA</label>
                            <p class="text-lg text-gray-800">{{ $business->financial->ebitda ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="block text-base font-semibold mb-1 text-gray-700">Asking Price</label>
                            <p class="text-lg text-gray-800">{{ $business->financial->asking_price ?? 'N/A' }}</p>
                        </td>
                    </tr>
                    <tr class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <td class="border px-4 py-2">
                            <label class="block text-base font-semibold mb-1 text-gray-700">FF&E</label>
                            <p class="text-lg text-gray-800">{{ $business->financial->ffe ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="block text-base font-semibold mb-1 text-gray-700">Inventory</label>
                            <p class="text-lg text-gray-800">{{ $business->financial->inventory ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="block text-base font-semibold mb-1 text-gray-700">Established</label>
                            <p class="text-lg text-gray-800">{{ $business->financial->established ?? 'N/A' }}</p>
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
                            <label class="block text-base font-semibold mb-1 text-gray-700">Rent</label>
                            <p class="text-lg text-gray-800">{{ $business->facility->rent ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="block text-base font-semibold mb-1 text-gray-700">Duration (months)</label>
                            <p class="text-lg text-gray-800">{{ $business->facility->duration_months ?? 'N/A' }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <label class="block text-base font-semibold mb-1 text-gray-700">Property Price</label>
                            <p class="text-lg text-gray-800">{{ $business->facility->property_price ?? 'N/A' }}</p>
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
                    <label class="block text-base font-semibold mb-1 text-gray-700">Price (New)</label>
                    <p class="text-lg text-gray-800">{{ $business->ffAndE->price_new ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="block text-base font-semibold mb-1 text-gray-700">Pending Payments</label>
                    <p class="text-lg text-gray-800">{{ $business->ffAndE->pending_payments ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="block text-base font-semibold mb-1 text-gray-700">Year</label>
                    <p class="text-lg text-gray-800">{{ $business->ffAndE->year ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Vehicles Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">Vehicles</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border px-4 py-2">
                    <label class="block text-base font-semibold mb-1 text-gray-700">Make and Model</label>
                    <p class="text-lg text-gray-800">{{ $business->vehicle->make_and_model ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="block text-base font-semibold mb-1 text-gray-700">Year</label>
                    <p class="text-lg text-gray-800">{{ $business->vehicle->year ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="block text-base font-semibold mb-1 text-gray-700">Km</label>
                    <p class="text-lg text-gray-800">{{ $business->vehicle->km ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Employees Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">Employees</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border px-4 py-2">
                    <label class="block text-base font-semibold mb-1 text-gray-700">Number of Employees</label>
                    <p class="text-lg text-gray-800">{{ $business->businessEmployee->number_employees ?? 'N/A' }}</p>
                </div>
                <div class="border px-4 py-2">
                    <label class="block text-base font-semibold mb-1 text-gray-700">Employee Cost (Company Cost)</label>
                    <p class="text-lg text-gray-800">{{ $business->businessEmployee->employee_cost ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Features Services Section -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">Features Services</h3>
            <div class="flex flex-wrap gap-2">
                @foreach ($business->features as $feature)
                    <span
                        class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full">{{ $feature->name }}</span>
                @endforeach
            </div>
        </div>

        <!-- QR Code Section (Optional) -->
        <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-white mb-6">
            <h3 class="text-lg font-semibold mb-4">QR Code</h3>
            @if ($business->qr_code)
                <img src="{{ $business->qr_code }}" alt="QR Code" class="w-32 h-32 object-contain">
            @else
                <p class="text-lg text-gray-800">No QR code available.</p>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // You can reuse the Google Maps display logic here to show the location on the map
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

    window.initMap = function() {
        const map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: {{ $business->latitude }},
                lng: {{ $business->longitude }}
            },
            zoom: 17,
        });

        new google.maps.Marker({
            position: {
                lat: {{ $business->latitude }},
                lng: {{ $business->longitude }}
            },
            map: map,
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        loadGoogleMapsScript(function() {
            window.initMap();
        });
    });
</script>
@endpush
