
<div class="form-group">
    <label for="parent_id">Category</label>
    <select class="form-control" id="parent_id" name="parent_id">
        @foreach($categories as $parent)
            <option value="{{ $parent->id }}" {{ isset($category) && $category->parent_id == $parent->id ? 'selected' : '' }}>
                {{ $parent->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">SubCategory</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
</div>
