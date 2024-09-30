@extends('front.layouts.app')




@section('content')

<div class="bg-white flex items-center justify-center min-h-screen">
    <div class="container xl:container-xl px-4 mx-auto grid grid-cols-1 gap-8 p-8">
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
                <div class="text-left p-4 shadow-lg bg-white rounded-lg" x-data="relatedBlogs()">
                    <h2 class="text-xl font-bold">{{ translate('Related Blogs') }}</h2>
                    <template x-for="(blog, index) in blogs" :key="index">
                        <div class="mt-4">
                            <img :src="blog.image_url" alt="{{ translate('Blog Image') }}" class="w-full h-32 object-cover rounded-lg mb-2">
                            <h3 class="text-lg font-bold" x-text="blog.title"></h3>
                            <p class="text-gray-600 mt-1" x-text="blog.date"></p>
                        </div>
                    </template>
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


@push('scripts')

<script>
    function relatedBlogs() {
        return {
            blogs: [],
            async fetchBlogs() {
                try {
                    const response = await fetch('/blogsAlljson');
                    if (!response.ok) throw new Error('Failed to fetch blogs');

                    const data = await response.json();
                    this.blogs = data.blogs.slice(0,3); // Display only 3 related blogs
                } catch (error) {
                    console.error('Error fetching blogs:', error);
                }
            },
            init() {
                this.fetchBlogs(); // Fetch blogs when the component initializes
            }
        };
    }
</script>
    
@endpush