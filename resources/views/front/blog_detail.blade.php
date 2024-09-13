@extends('front.layouts.app')




@section('content')
    
    <div class="bg-white flex items-center justify-center min-h-screen">
        <div class="container xl:container-xl px-4 mx-auto grid grid-cols-1  gap-8 p-8">
            <!-- Card 1 -->
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 md:col-span-8">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                      <img src="{{ url($blog->getFirstMediaUrl('blogs')) }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <span class="block text-blue-500 text-sm mb-2">{{ $blog->date }}</span>
                            <h3 class="text-xl font-bold mb-2">{{ $blog->title }}</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">{!! $blog->description !!}.</p>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <div class="text-left p-4 shadow-lg bg-white rounded-lg">
                        <h2 class="text-xl font-bold">Related Blogs</h2>
                        <p class="text-gray-600 mt-2 pb-14">Embrace the advantages of property listing and become a part of our
                            community
                            today.</p>
                    </div>
        
                    <div id="blogs-container" class="grid grid-cols-1 py-8">
                        <!-- Card 1 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front.partials.footer')
@endsection