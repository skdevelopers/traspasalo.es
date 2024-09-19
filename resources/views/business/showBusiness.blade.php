@extends('front.layouts.app')
@section('content')

<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-center">All Businesses</h2>

    <!-- Search Form -->
    <form action="#" method="GET" class="mb-8">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
            <!-- Keyword Input -->
            <div>
                <label for="keyword" class="block text-gray-700 font-semibold">Keyword</label>
                <input type="text" name="keyword" id="keyword" value="{{ request()->keyword }}" class="w-full border border-gray-300 rounded p-2" placeholder="Search by keyword">
            </div>
    
            <!-- Location Input -->
            <div>
                <label for="location" class="block text-gray-700 font-semibold">Location</label>
                <input type="text" name="location" id="location" value="{{ request()->location }}" class="w-full border border-gray-300 rounded p-2" placeholder="Search by location">
            </div>
    
            <!-- Category Dropdown -->
            <div>
                <label for="category_id" class="block text-gray-700 font-semibold">Category</label>
                <select name="category" id="category" class="w-full border border-gray-300 rounded p-2">
                    <option value="">Select Categories</option>
                </select>
            </div>
    
            <!-- Subcategory Dropdown -->
            <div>
                <label for="subcategory_id" class="block text-gray-700 font-semibold">Subcategory</label>
                <select name="subcategory" id="subcategory" class="w-full border border-gray-300 rounded p-2">
                    <option value="">Select Subcategories</option>
                </select>
            </div>
    
            <!-- Search Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-indigo-900 hover:bg-indigo-900 text-gray-300 font-bold py-3 px-4 rounded w-full">Search</button>
            </div>
        </div>
    </form>
    

    <!-- Display Businesses -->
    @if($businesses->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($businesses as $business)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="{{ $business->category->getImageUrlAttribute() }}" alt="Category Image" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-bold mb-2"><a href="{{ route('business.show', $business->id) }}">{{ $business->business_title }}</a></h3>
                    <p class="text-gray-600">{{ $business->location }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500">No businesses found</p>
    @endif

    <!-- Pagination Links -->
    {{-- <div class="mt-6">
        {{ $businesses->links() }}
    </div> --}}
</div>



@include('front.partials.footer')
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category');
        const subcategorySelect = document.getElementById('subcategory');

        // Fetch categories from the API when the page loads
        fetch('/getCategories')
            .then(response => response.json())
            .then(data => {
                data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching categories:', error));

        // Listen for category change event and fetch subcategories dynamically
        categorySelect.addEventListener('change', function() {
            const categoryId = categorySelect.value;

            // Clear subcategory dropdown before making the request
            subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';

            if (categoryId) {
                fetch(`/categories/${categoryId}/subcategories`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching subcategories:', error));
            }
        });
    });
</script>
    
@endpush