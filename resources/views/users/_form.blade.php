<div class="mb-4">
    <label for="first_name" class="block text-gray-700 text-sm font-medium mb-2">First Name:</label>
    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" class="w-full mt-1 p-2 border border-gray-300 rounded" disabled>
</div>
<div class="mb-4">
    <label for="last_name" class="block text-gray-700 text-sm font-medium mb-2">Last Name:</label>
    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" class="w-full mt-1 p-2 border border-gray-300 rounded" disabled>
</div>

<div class="mb-4">
    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" class="w-full mt-1 p-2 border border-gray-300 rounded" disabled>
</div>

<div class="mb-4">
    <label for="roles" class="block text-gray-700 text-sm font-medium mb-2">Roles:</label>
    <select name="roles[]" id="roles" class="w-full mt-1 p-2 border border-gray-300 rounded">
        @foreach ($roles as $role)
            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select>
</div>
