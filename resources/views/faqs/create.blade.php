@extends('layouts.vertical', ['title' => 'Create FAQs', 'sub_title' => 'FAQs'])

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Add New FAQ</h1>

        <form action="{{ route('faqs.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="question" class="block text-gray-700 font-bold mb-2">Question</label>
                <input type="text" name="question" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="answer" class="block text-gray-700 font-bold mb-2">Answer</label>
                <textarea name="answer" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500" rows="4" required></textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit</button>
        </form>
    </div>
@endsection
