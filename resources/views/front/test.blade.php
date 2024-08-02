@extends('front.layouts.app')

@section('title', 'Simple & flexible pricing')
@section('header-title', 'Simple & flexible pricing')
@section('header-subtitle', '')
@push('styles')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
@endpush

@section('content')

<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6" x-data="featureDisplay()" x-init="fetchFeatures">
  <h2 class="text-lg font-semibold mb-4">Feature List</h2>
  
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      <template x-for="feature in features" :key="feature.feature">
          <div class="text-center w-full border border-gray-300 p-4 rounded-lg">
              <div class="flex justify-center items-center h-12 w-12 bg-gray-100 rounded-full mb-2">
                  <span class="material-icons-round" x-text="feature.icon"></span>
              </div>
              <p class="text-gray-700" x-text="feature.feature"></p>
          </div>
      </template>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function featureDisplay() {
      return {
          features: [],
          fetchFeatures() {
              fetch('/features.json')
                  .then(response => response.json())
                  .then(data => {
                      this.features = data;
                  })
                  .catch(error => console.error('Error fetching features:', error));
          }
      }
  }
</script>
@endpush
