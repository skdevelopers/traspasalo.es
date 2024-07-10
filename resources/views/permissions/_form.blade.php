<div class="form-group">
    <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $permission->name ?? '') }}" class="form-input" required>
</div>

<div class="form-group">
    <label for="description" class="text-gray-800 text-sm font-medium inline-block mb-2">Description:</label>
    <textarea name="description" id="description" class="form-input" required>{{ old('description', $permission->description ?? '') }}</textarea>
</div>

<!-- Add more fields as needed -->