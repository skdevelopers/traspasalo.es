
<!-- resources/views/business/index.blade.php -->

@extends('layouts.vertical', ['title' => 'Display Businesses', 'sub_title' => 'Busienss'])

@section('content')
<div class="container" x-data="businessModal()">
    <div class="grid grid-cols-12">
        <div class="col-span-12">

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-md shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">SubCategory</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Age Restriction</th>
                    <th class="px-4 py-2">Pets Permission</th>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count=0;
                @endphp
                @forelse($businesses as $business)
                    <tr>
                        <td class="border px-4 py-2">{{ ++$count }}</td>
                        <td class="border px-4 py-2">{{ $business->business_title }}</td>
                        <td class="border px-4 py-2">{{ $business->category->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $business->subcategory->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ Str::limit($business->description, 50) ?? 'N/A'}}</td>
                        <td class="border px-4 py-2">{{ $business->age_restriction ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $business->pets_permission ?? 'N/A'}}</td>
                        <td class="border px-4 py-2">{{ $business->location ?? 'N/A' }}</td>

                        <td class="border px-4 py-2 whitespace-nowrap">
                            {{-- <button class="text-blue-500 hover:text-blue-700 mx-0.5">
                                <i class="mgc_expand_line text-lg"></i><a href={{ route('business.show', $business->id) }}> View Details
                            </button> --}}
                            <a href="{{ route('business.show', $business->id) }}" class="text-green-500 hover:text-green-700 mx-0.5">
                                <i class="mgc_display_line text-lg"></i>
                            </a>
                            <a href="{{ route('business.edit', $business->id) }}"
                               class="text-blue-500 hover:text-blue-700 mx-0.5">
                                <i class="mgc_edit_line text-lg"></i>
                            </a>
                            <form action="{{ route('business.delete', $business->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 mx-0.5"
                                        onclick="return confirm('Are you sure you want to delete this business?')">
                                    <i class="mgc_delete_line text-xl"></i>
                                </button>
                            </form>
                        
                        </td>
                    </tr>
                    
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500">
                            No Business found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $businesses->links() }}
    </div>


    <!-- Modal -->
    <div x-show="showModal" style="display: none;" class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline" x-text="business.business_title"></h3>
                    <div class="mt-2">
                        <p><strong>Business Description:</strong><span x-text="business.description"></span></p>
                        <p><strong>Business Category:</strong> <span x-text="business.category.name"></span></p>
                        <p><strong>Age Restriction:</strong> <span x-text="business.age_restriction"></span></p>
                        <p><strong>Pets Permission:</strong> <span x-text="business.pets_permission"></span></p>
                        <p><strong>Location:</strong> <span x-text="business.location"></span></p>
                        
                        <p><strong>Feature Services:</strong></p>
                        <ul>
                            <template x-for="feature in business.features" :key="feature.id">
                                <li x-text="feature.name"></li>
                            </template>
                        </ul>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div x-show="showError" style="display: none;" class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-error-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-error-headline">Error</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500" x-text="errorMessage"></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="showError = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div></div>
@endsection

<script>
function businessModal() {
    return {
        showModal: false,
        showError: false,
        business: {},
        errorMessage: '',
        fetchBusiness(id) {
            fetch(`/business/${id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.error) {
                        this.errorMessage = data.error;
                        this.showError = true;
                    } else {
                        this.business = data;
                        this.showModal = true;
                    }
                })
                .catch(error => {
                    this.errorMessage = 'An error occurred while fetching the business data.';
                    this.showError = true;
                });
        }
    }
}
</script>
