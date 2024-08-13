<!-- resources/views/feature-services/feature.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Features Service', 'sub_title' => 'Features'])

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-5">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Add Feature Service</h1>
        <form action="{{ route('feature-services.store') }}" method="POST" class="space-y-6">
            @csrf
            @include('feature-services._form')
            <div class="col-span-12">
                <button type="submit" class="w-full inline-flex justify-center items-center bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/features.json')
            .then(response => response.json())
            .then(data => {
                const featureSelect = document.getElementById('name');
                data.forEach(feature => {
                    const option = document.createElement('option');
                    option.value = feature.feature;
                    option.textContent = feature.feature;
                    featureSelect.appendChild(option);
                });

                // Set the old value if available
                const oldFeature = '{{ old('name', $featureService->name ?? '') }}';
                if (oldFeature) {
                    featureSelect.value = oldFeature;
                }
            })
            .catch(error => console.error('Error loading features:', error));
    });
</script>
@endpush
