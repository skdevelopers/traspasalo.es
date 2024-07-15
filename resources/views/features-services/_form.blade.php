<div class="form-group">
    <label for="name">Feature Name:</label>
    <input type="text" id="name" name="name" placeholder="Feature Name" required>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
{{-- <div class="form-group">
    <label for="parent_id">Parent Category</label>
    <select class="form-control" id="parent_id" name="parent_id">
        <option value="">None</option>
        @foreach ($categories as $parent)
            <option value="{{ $parent->id }}" {{ isset($category) && $category->parent_id == $parent->id ? 'selected' : '' }}>
                {{ $parent->name }}
            </option>
        @endforeach
    </select>
</div> --}}
