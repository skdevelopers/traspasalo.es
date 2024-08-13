<!-- resources/views/categories/index.blade.php -->
@extends('layouts.vertical', ['title' => 'Display Categories', 'sub_title' => 'Category'])

@section('content')
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12">
            <a href="{{ route('category') }}"
               class="inline-flex justify-center items-center bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">
                <i class="mgc_add_line text-lg me-2"></i> Create New Category
            </a>
        </div>
        <div class="col-span-12">
            <a href="{{ route('categories.create') }}"
               class="inline-flex justify-center items-center bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">
                <i class="mgc_add_line text-lg me-2"></i> Create New SubCategory
            </a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4 mt-6">
        <div class="col-span-12">
            <div class="overflow-x-auto bg-white rounded-md shadow-md">
                <table class="min-w-full bg-white rounded-md">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700">#</th>
                        <th class="px-4 py-2 text-left text-gray-700">Category Name</th>
                        <th class="px-4 py-2 text-left text-gray-700">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr class="border-t">
                            <td class="border px-4 py-2">{{ $category->id }}</td>
                            <td class="border px-4 py-2">{{ $category->name }}</td>
                            <td class="border px-4 py-2 whitespace-nowrap flex items-center space-x-2">
                                <button onclick="toggleSubcategories({{ $category->id }})"
                                        class="text-blue-500 hover:text-blue-700">
                                     <i class="fa fa-info-circle" aria-hidden="true"></i> View Subcategories
                                </button>
                                @can('edit roles')
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="text-yellow-500 hover:text-yellow-700">
                                    <i class="mgc_edit_line text-lg"></i>
                                </a>
                                @endcan
                                @can('delete roles')
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="mgc_delete_line text-xl"></i>
                                    </button>
                                </form>
                                @endcan
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
                            <td colspan="3" class="text-center text-gray-500 py-4">
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

            if (subcategoriesList.children.length !== 0) {
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
                            li.innerHTML = `
                                ${subcategory.name}
                                <button onclick="toggleSubcategories(${subcategory.id})"
                                        class="text-blue-500 hover:text-blue-700 mx-0.5">
                                    <i class="mgc_expand_line text-lg"></i> View Subcategories
                                </button>
                                <ul id="subcategories-${subcategory.id}" class="bg-gray-100 px-4 py-2 hidden"></ul>
                            `;
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
