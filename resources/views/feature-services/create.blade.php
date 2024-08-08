<!-- resources/views/feature-services/feature.blade.php -->
@extends('layouts.vertical', ['title' => 'Create Features Service', 'sub_title' => 'Features'])

@section('content')
    <div class="container mt-5">
        <h1>Add Feature Service</h1>
        <form action="{{ route('feature-services.store') }}" method="POST">
            @csrf
            @include('feature-services._form')
            <button type="submit" class="btn btn-primary">Save</button>
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
