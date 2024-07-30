<div class="mb-4">
    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name:</label>
    <input type="text" name="name" id="name" class="w-full mt-1 p-2 border border-gray-300 rounded" value="{{ old('name', $role->name ?? '') }}" required>
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-medium mb-2">Permissions:</label>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($permissions as $permission)
            <div class="flex items-center">
                <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}"
                       @if(isset($role) && $role->permissions->contains($permission->id)) checked @endif
                       class="form-checkbox h-4 w-4 text-blue-600">
                <label for="permission_{{ $permission->id }}" class="ml-2 text-gray-700">{{ $permission->name }}</label>
            </div>
        @endforeach
    </div>
</div>
