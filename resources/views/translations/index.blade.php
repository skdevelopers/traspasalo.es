@extends('layouts.vertical', ['title' => 'Translations', 'sub_title' => 'Translate Words'])

@section('content')
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 mb-4">
            <a href="{{ route('translations.create') }}" class="btn inline-flex justify-center items-center bg-primary text-white w-full">
                <i class="mgc_add_line text-lg me-2"></i> Create New Translation
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="col-span-12 bg-green-100 text-green-700 p-4 rounded-md">
                {{ $message }}
            </div>
        @endif

        <div class="col-span-12">
            <div class="overflow-x-auto bg-white rounded-md shadow-md">
                <table class="min-w-full bg-white rounded-md">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left text-gray-700">Key</th>
                            <th class="px-4 py-2 text-left text-gray-700">Language</th>
                            <th class="px-4 py-2 text-left text-gray-700">Value</th>
                            <th class="px-4 py-2 text-left text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($translations as $translation)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $translation->key }}</td>
                            <td class="px-4 py-2">{{ $translation->language }}</td>
                            <td class="px-4 py-2">{{ $translation->value }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('translations.show', $translation->id) }}" class="text-blue-500 hover:underline">Show</a>
                                <a href="{{ route('translations.edit', $translation->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                <form action="{{ route('translations.destroy', $translation->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this translation?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
