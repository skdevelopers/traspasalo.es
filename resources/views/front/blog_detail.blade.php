@extends('front.layouts.app')

@section('title', 'Blog')
@section('header-title',  $blog->title )
@section('header-subtitle', '')


@section('content')
    @include('front.partials.banner')
    
    <div class="bg-white flex items-center justify-center min-h-screen">
        <div class="container xl:container-xl px-4 mx-auto grid grid-cols-1  gap-8 p-8">
            <!-- Card 1 -->
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
              <img src="{{ url($blog->getFirstMediaUrl('blogs')) }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover">
                <div class="p-6">
                    <span class="block text-blue-500 text-sm mb-2">{{ $blog->date }}</span>
                    <h3 class="text-xl font-bold mb-2">{{ $blog->title }}</h3>
                </div>
            </div>
            <p class="text-gray-600 mb-4">{!! $blog->description !!}.</p>
        </div>
    </div>

@endsection