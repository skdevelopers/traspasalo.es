<div class="grid grid-cols-12 gap-4">
    <!-- Category Selection -->
    <div class="col-span-12">
        <label for="parent_id" class="block text-sm font-medium text-gray-700">Category</label>
        <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="parent_id" name="parent_id">
            @foreach($categories as $parent)
                <option value="{{ $parent->id }}" {{ isset($category) && $category->parent_id == $parent->id ? 'selected' : '' }}>
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
</div>
