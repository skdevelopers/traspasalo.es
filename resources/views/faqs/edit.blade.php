@extends('layouts.vertical', ['title' => 'Edit FAQs', 'sub_title' => 'FAQs'])

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Edit FAQ</h1>

        <form action="{{ route('faqs.update', $faq->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="question" class="block text-gray-700 font-bold mb-2">Question</label>
                <input type="text" name="question" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500" value="{{ $faq->question }}" required>
            </div>
            <div class="mb-4">
                <label for="answer" class="block text-gray-700 font-bold mb-2">Answer</label>
                <textarea name="answer" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500" rows="4" required>{{ $faq->answer }}</textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
        </form>
    </div>
@endsection
