<div class="form-group">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <label for="name">Feature Name:</label>
    <select class="form-control" id="name" name="name" required>
        <option value="">Select a Feature</option>
    </select>
</div>
