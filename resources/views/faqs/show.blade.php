@extends('layouts.vertical', ['title' => 'Show FAQs', 'sub_title' => 'FAQs'])


@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">{{ $faq->question }}</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="text-gray-700">{{ $faq->answer }}</p>
        </div>
    </div>
@endsection
