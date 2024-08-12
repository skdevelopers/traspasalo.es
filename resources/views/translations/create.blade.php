@extends('layouts.vertical', ['title' => 'Create Translations', 'sub_title' => 'Translate Words'])

@section('content')
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 mb-4">
            <a href="{{ route('translations.index') }}" class="btn inline-flex justify-center items-center bg-primary text-white w-full">
                <i class="mgc_arrow_back_line text-lg me-2"></i> Back to Translations
            </a>
        </div>

        <div class="col-span-12">
            <div class="bg-white rounded-md shadow-md p-6">
                <h1 class="text-2xl font-bold mb-6">Create Translation</h1>

                <form action="{{ route('translations.store') }}" method="POST" class="grid grid-cols-12 gap-4">
                    @csrf
                    <div class="col-span-12">
                        <label for="key" class="block text-sm font-medium text-gray-700">Key</label>
                        <input type="text" name="key" id="key" required 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="col-span-12">
                        <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                        <input type="text" name="language" id="language" required 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="col-span-12">
                        <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
                        <textarea name="value" id="value" required rows="4" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <div class="col-span-12">
                        <button type="submit" 
                                class="w-full inline-flex justify-center items-center bg-primary text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="mgc_save_line text-lg me-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
