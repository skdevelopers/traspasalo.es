<!-- resources/views/categories/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Display Categories', 'sub_title' => 'Category'])

@section('content')
    <div class="grid grid-cols-12">
        <div class="mb-4 col-span-12">
            <a href="{{ route('categories.create') }}"
               class="btn inline-flex justify-center items-center bg-primary text-white w-full">
                <i class="mgc_add_line text-lg me-2"></i> Create New Category
            </a>
        </div>
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <!-- Table to display categories -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-md shadow-md">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Category Name</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="border px-4 py-2">{{ $category->id }}</td>
                            <td class="border px-4 py-2">{{ $category->name }}</td>
                            <td class="border px-4 py-2 whitespace-nowrap">
                                <button onclick="toggleSubcategories({{ $category->id }})"
                                        class="text-blue-500 hover:text-blue-700 mx-0.5">
                                    <i class="mgc_expand_line text-lg"></i> View Subcategories
                                </button>
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="text-blue-500 hover:text-blue-700 mx-0.5">
                                    <i class="mgc_edit_line text-lg"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5"
                                            onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="mgc_delete_line text-xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <ul id="subcategories-{{ $category->id }}" class="bg-gray-100 px-4 py-2 hidden">
                                    <!-- Subcategories will be loaded here -->
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500">
                                No categories found. <a href="{{ route('categories.create') }}"
                                                        class="text-blue-500 hover:underline">Create one</a>.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleSubcategories(categoryId) {
            const subcategoriesList = document.getElementById(`subcategories-${categoryId}`);

            if (subcategoriesList.innerHTML.trim() !== '') {
                subcategoriesList.classList.toggle('hidden');
                return;
            }

            axios.get(`/categories/${categoryId}/subcategories`)
                    .then(response => {
                        const subcategories = response.data;
                        subcategoriesList.innerHTML = '';

                        if (subcategories.length > 0) {
                            subcategories.forEach(subcategory => {
                                const li = document.createElement('li');
                                li.innerHTML = `${subcategory.name} <button onclick="toggleSubcategories(${subcategory.id})" class="text-blue-500 hover:text-blue-700 mx-0.5">
                                    <i class="mgc_expand_line text-lg"></i> View Subcategories
                                </button>
                                <ul id="subcategories-${subcategory.id}" class="bg-gray-100 px-4 py-2 hidden"></ul>`;
                                subcategoriesList.appendChild(li);
                            });
                        } else {
                            subcategoriesList.innerHTML = '<li class="text-gray-500">No subcategories found.</li>';
                        }

                        subcategoriesList.classList.remove('hidden');
                    })
                    .catch(error => {
                        console.error('Error loading subcategories:', error);
                    });
        }
    </script>
@endpush
