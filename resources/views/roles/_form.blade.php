<!-- roles/_form.blade.php -->

<div>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $role->name ?? '') }}">
</div>

<!-- Add more fields as needed -->

<div>
    <label>Permissions:</label>
    @foreach($permissions as $permission)
        <div>
            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}"
                   @if(isset($role) && $role->permissions->contains($permission->id)) checked @endif>
            <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
        </div>
    @endforeach
</div>
