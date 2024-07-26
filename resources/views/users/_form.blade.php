<div class="form-group">
    <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">First Name:</label>
    <input type="text" name="first_name" id="first_name" value="{{ old('name', $user->first_name ?? '') }}" class="form-input" disabled>
</div>
<div class="form-group">
    <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">Last Name:</label>
    <input type="text" name="last_name" id="last_name" value="{{ old('name', $user->last_name ?? '') }}" class="form-input" disabled>
</div>

<div class="form-group">
    <label for="email" class="text-gray-800 text-sm font-medium inline-block mb-2">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" class="form-input" disabled>
</div>

<div class="form-group">
    <label for="roles" class="text-gray-800 text-sm font-medium inline-block mb-2">Roles:</label>
    <select name="roles[]" id="roles" class="form-input" multiple>
        @foreach ($roles as $role)
            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select>
</div>
