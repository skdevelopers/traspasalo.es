@extends('layouts.vertical', ['title' => 'Show Translations', 'sub_title' => 'Translate Words'])

@section('content')
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Translation Details</h1>
        </div>

        <div class="col-span-12 bg-white p-6 rounded-md shadow-md">
            <div class="mb-4">
                <strong class="text-gray-700">Key:</strong> 
                <span class="text-gray-900">{{ $translation->key }}</span>
            </div>
            <div class="mb-4">
                <strong class="text-gray-700">Language:</strong> 
                <span class="text-gray-900">{{ $translation->language }}</span>
            </div>
            <div class="mb-6">
                <strong class="text-gray-700">Value:</strong> 
                <span class="text-gray-900">{{ $translation->value }}</span>
            </div>
            <a href="{{ route('translations.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-indigo-700">
                <i class="mgc_arrow_back_line text-lg mr-2"></i> Back to list
            </a>
        </div>
    </div>
@endsection
