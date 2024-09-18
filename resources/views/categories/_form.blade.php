<div class="grid grid-cols-12 gap-4">
    <!-- Category Selection -->
    <div class="col-span-12">
        <label for="parent_id" class="block text-sm font-medium text-gray-700">Category</label>
        <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="parent_id" name="parent_id">
            <option value="">Select a Category</option>
            @foreach($categories as $parent)
                <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- SubCategory Input -->
    <div class="col-span-12">
        <label for="name" class="block text-sm font-medium text-gray-700">SubCategory</label>
        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
    </div>

    <!-- Image Upload -->
    <div class="col-span-12">
        <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
        <input type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="image" name="image">
    </div>

    <!-- Display Existing Image -->
    @if(isset($category) && $category->getFirstMediaUrl('images'))
        <div class="col-span-12">
           
            <img src="{{ $category->getFirstMediaUrl('images', 'thumb') }}" alt="{{ $category->name }}" class="mt-2 w-24 h-24 object-cover rounded-md">
        </div>
    @endif
</div>
