@extends('layouts.vertical', ['title' => 'Display FAQs', 'sub_title' => 'FAQs'])

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Frequently Asked Questions</h1>
        <a href="{{ route('faqs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New FAQ</a>
        <div class="mt-6">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-6 text-left">Question</th>
                        <th class="py-3 px-6 text-left">Answer</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach ($faqs as $faq)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $faq->question }}</td>
                            <td class="py-3 px-6">{{ $faq->answer }}</td>
                            <td class="py-3 px-6 text-right">
                                <a href="{{ route('faqs.edit', $faq->id) }}" class="text-yellow-500 hover:text-yellow-600 mx-2">Edit</a>
                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
