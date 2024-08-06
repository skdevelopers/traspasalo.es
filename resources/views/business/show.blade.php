@extends('front.layouts.app')

@section('title', 'Businesses')
@section('header-title', 'Businesses')
@section('header-subtitle', '')


@section('content')

<div class="p-10  shadow-md">
    <form method="GET" action="/businesses" class="flex space-x-4">
        <select id="category_id" name="category_id" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ request('category_id') }}"></select>
        <select id="subcategory_id" name="subcategory_id" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ request('subcategory_id') }}">
            <option value="">Sub Type</option>
        </select>
        <input type="text" id="autocomplete" name="location" placeholder="Location" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ request('location') }}">
        <input type="text" name="keyword" placeholder="Keyword" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ request('keyword') }}">
        <button type="submit" class="p-2 bg-violet-900 text-white rounded-lg">Search</button>
    </form>
</div>

<div class="p-4 grid grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-4">
    @forelse($businesses as $business)
    <div class="bg-white p-4 rounded-lg shadow-md">
        <div class="mb-4">
            <img src="{{ $business->getFirstMediaUrl('default', 'thumb') ?? 'https://via.placeholder.com/150' }}" alt="{{ $business->business_title }}" class="w-full h-48 object-cover rounded-lg">
        </div>
        <h3 class="text-lg font-bold mb-2"><a href={{ route('business.show', $business->id ) }}>{{ $business->business_title }}</a></h3>
        <p class="text-gray-700 mb-2">{{ $business->description }}</p>
        <p class="text-gray-500">{{ $business->location }}</p>
        <p class="text-gray-500">Status: {{ ucfirst($business->status) }}</p>
        <p class="text-gray-500">250 €</p>
        <div class="mt-4">
             @if ($business->qr_code_path)
                            <img src="{{ Storage::url($business->qr_code_path) }}" alt="QR Code" width="50">
                        @else
                            No QR Code
                        @endif
        </div>
    </div>
    @empty
       No Business Found
    @endforelse
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
      axios.get('/getCategories')
          .then(function (response) {
              if(response.data.status === 1) {
                  var categories = response.data.categories;
                  var categorySelect = document.getElementById('category_id');
                  categorySelect.innerHTML = '<option value="">Business Type</option>';
                  for (var name in categories) {
                      var option = document.createElement('option');
                      option.value = categories[name];
                      option.textContent = name;
                      categorySelect.appendChild(option);
                  }
              }
          })
          .catch(function (error) {
              console.error('Error fetching categories:', error);
              alert('Failed to fetch categories.');
          });
  });


  document.addEventListener('DOMContentLoaded', function () {
      const categorySelect = document.getElementById('category_id');
      const subCategorySelect = document.getElementById('subcategory_id');
  
      categorySelect.addEventListener('change', function () {
          const categoryId = this.value;
  
          // Clear previous subcategories
          subCategorySelect.innerHTML = '<option value="">Sub Type</option>';
  
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
          //dropdown list


      function locationApp() {
  return {
      initMap() {
          // const map = new google.maps.Map(document.getElementById('map'), {
          //     center: {
          //         lat: -34.397,
          //         lng: 150.644
          //     },
          //     zoom: 8
          // });

          const input = document.getElementById('autocomplete');
          const autocomplete = new google.maps.places.Autocomplete(input);

          autocomplete.addListener('place_changed', function() {
              const place = autocomplete.getPlace();
              if (!place.geometry) {
                  return;
              }

              // if (place.geometry.viewport) {
              //     map.fitBounds(place.geometry.viewport);
              // } else {
              //     map.setCenter(place.geometry.location);
              //     map.setZoom(17);
              // }

              // new google.maps.Marker({
              //     position: place.geometry.location,
              //     map: map
              // });
          });
      }
  };
}

// Load Google Maps script dynamically with async and defer
function loadGoogleMapsScript() {
  const script = document.createElement('script');
  script.src = `https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initMap`;
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

  </script>
    
@endpush