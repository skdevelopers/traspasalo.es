<div>
    <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $customer->name ?? '') }}" class="form-input" required>
    @error('name')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="email" class="text-gray-800 text-sm font-medium inline-block mb-2">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $customer->email ?? '') }}" class="form-input" required>
    @error('email')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="phone" class="text-gray-800 text-sm font-medium inline-block mb-2">Phone:</label>
    <input type="tel" name="phone" id="phone" value="{{ old('phone', $customer->phone ?? '') }}" class="form-input" required>
    @error('phone')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="address" class="text-gray-800 text-sm font-medium inline-block mb-2">Job:</label>
    <input name="job_position" id="job_position" class="form-input" required>{{ old('job_position', $customer->job_position ?? '') }}</textarea>
    @error('job_position')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="description" class="text-gray-800 text-sm font-medium inline-block mb-2">Description:</label>
    <textarea name="description" id="description" class="form-input">{{ old('description', $customer->description ?? '') }}</textarea>
    @error('description')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Image:</label>
    <input type="file" name="image" id="image" class="form-input">
    @error('image')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
