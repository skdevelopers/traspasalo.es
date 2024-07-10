<div>
    <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $supplier->name ?? '') }}" class="form-input" required>
</div>

<div>
    <label for="email" class="text-gray-800 text-sm font-medium inline-block mb-2">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $supplier->email ?? '') }}" class="form-input" required>
</div>

<div>
    <label for="phone" class="text-gray-800 text-sm font-medium inline-block mb-2">Phone:</label>
    <input type="tel" name="phone" id="phone" value="{{ old('phone', $supplier->phone ?? '') }}" class="form-input" required>
</div>

<div>
    <label for="address" class="text-gray-800 text-sm font-medium inline-block mb-2">Address:</label>
    <textarea name="address" id="address" class="form-input" required>{{ old('address', $supplier->address ?? '') }}</textarea>
</div>

<!-- Add more fields as needed -->

