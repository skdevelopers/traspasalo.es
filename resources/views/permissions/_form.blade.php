<div class="mb-4 col-span-3">
    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $permission->name ?? '') }}" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
</div>
<div class="mb-4 col-span-3">
    <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Description:</label>
    <textarea name="description" id="description" class="w-full mt-1 p-2 border border-gray-300 rounded" required>{{ old('description', $permission->description ?? '') }}</textarea>
</div>
