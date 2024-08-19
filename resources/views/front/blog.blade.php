@extends('front.layouts.app')

@section('title', 'Blog')
@section('header-title', 'Our Latest Blogs')
@section('header-subtitle', '')

@push('styles')
<style>

    /* Custom Styles for slider */
    .slider {
      overflow: hidden;
      position: relative;
    }

    .slider-track {
      display: flex;
      transition: transform 0.3s ease;
    }

    .slider-item {
      flex: 0 0 33.3333%;
      max-width: 33.3333%;
    }

    .slider-button {
      position: absolute;
      top: 0;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 0.5rem;
      border-radius: 25%;
      border: 1px solid gray;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: gray;
      font-size: 1.25rem;
      margin-top: -0.5rem;
      cursor: pointer;
    }

    .slider-button-prev {
      right: 3rem;
    }

    .slider-button-next {
      right: 1rem;
    }
  </style>
@endpush

@section('content')
    @include('front.partials.banner')

    <div class="bg-white flex items-center justify-center min-h-screen">
        <div class="container xl:container-xl px-4 mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
            <!-- Card 1 -->
            @foreach($blogs as $blog)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
              <img src="{{ url($blog->getFirstMediaUrl('blogs')) }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover">
                <div class="p-6">
                    <span class="block text-blue-500 text-sm mb-2">{{ $blog->date }}</span>
                    <h3 class="text-xl font-bold mb-2">{{ $blog->title }}</h3>
                    <span class="text-gray-600 mb-4 line-clamp-2">{!! $blog->description !!}.</span>
                    <a href="{{ route('blogs.show', $blog->id) }}" class="text-orange-500 hover:underline">Read More &rarr;</a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>

    <div class="bg-white container-fluid">
        <div class=" bg-white container mx-auto py-10 px-2">
            <div class="relative">
              <h2 class="text-2xl font-bold mb-5">The Latest</h2>
              <button class="slider-button slider-button-prev mr-4">&larr;</button>
              <button class="slider-button slider-button-next">&rarr;</button>
            </div>
            <div class="slider relative  overflow-hidden">
              <div class="slider-track flex sm:grid-cols-1">
                <div class="slider-item p-2">
                  <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src={{ asset('front/assets/images/water-house.svg')}} alt="Image 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <span class="text-sm text-orange-500">Real Estate</span><span> | January 19, 2024</span>
                      <h3 class="text-md font-semibold">How to build a scalable customer service team structure</h3>
                    </div>
                  </div>
                </div>
                <div class="slider-item p-2">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                      <img src={{ asset('front/assets/images/park-house.svg')}} class="w-full h-48 object-cover">
                      <div class="p-4">
                        <span class="text-sm text-orange-500">Real Estate</span><span> | January 19, 2024</span>
                      <h3 class="text-md font-semibold">How to build a scalable customer service team structure</h3>
                    </div>
                    </div>
                  </div>
                <div class="slider-item p-2">
                  <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src={{ asset('front/assets/images/farm-house.svg')}} alt="Image 2" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <span class="text-sm text-orange-500">Real Estate</span><span> | January 19, 2024</span>
                      <h3 class="text-md font-semibold">How to build a scalable customer service team structure</h3>
                    </div>
                  </div>
                </div>
                <div class="slider-item p-2">
                  <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src={{ asset('front/assets/images/water-house.svg')}} alt="Image 3" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <span class="text-sm text-orange-500">Real Estate</span><span> | January 19, 2024</span>
                      <h3 class="text-md font-semibold">How to build a scalable customer service team structure</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



    <div class="bg-white flex items-center justify-center min-h-screen">
        <div class="w-full  max-w-full mx-auto grid grid-cols-1 md:grid-cols-2  bg-white">
            <!-- Text Section -->
            <div class="bg-pink-100 px-20 flex flex-col justify-center">
                <span class="text-red-500 font-semibold mb-2">Featured topic</span>
                <h1 class="text-4xl font-bold mb-4">Productivity</h1>
                <p class="text-gray-700 mb-6">Discover insights, tips, and strategies to boost your professional productivity and efficiency. From cutting down emails to automating your team's workflow.</p>
                <a href="#" class="text-red-500 hover:underline">Browse posts &rarr;</a>
            </div>
            <!-- Image Section -->
            <div class="bg-orange-500  flex items-center justify-center">
                <img src={{asset('front/assets/images/3D-cubes.svg')}} alt="Productivity Image" class="w-full h-auto">
            </div>
        </div>
    </div>

   <div class="bg-white container-fluid">
    <div class=" bg-white container mx-auto py-10 px-2">
        <div class="relative">
          <h2 class="text-2xl font-bold mb-5">The Latest</h2>
          <button class="slider-button slider-button-prev mr-4">&larr;</button>
          <button class="slider-button slider-button-next">&rarr;</button>
        </div>
        <div class="slider relative  overflow-hidden">
          <div class="slider-track flex">
            <div class="slider-item p-2">
              <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src={{ asset('front/assets/images/water-house.svg')}} alt="Image 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="text-sm text-orange-500">Real Estate</span><span> | January 19, 2024</span>
                  <h3 class="text-md font-semibold">How to build a scalable customer service team structure</h3>
                </div>
              </div>
            </div>
            <div class="slider-item p-2">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                  <img src={{ asset('front/assets/images/park-house.svg')}} class="w-full h-48 object-cover">
                  <div class="p-4">
                    <span class="text-sm text-orange-500">Real Estate</span><span> | January 19, 2024</span>
                  <h3 class="text-md font-semibold">How to build a scalable customer service team structure</h3>
                </div>
                </div>
              </div>
            <div class="slider-item p-2">
              <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src={{ asset('front/assets/images/farm-house.svg')}} alt="Image 2" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="text-sm text-orange-500">Real Estate</span><span> | January 19, 2024</span>
                  <h3 class="text-md font-semibold">How to build a scalable customer service team structure</h3>
                </div>
              </div>
            </div>
            <div class="slider-item p-2">
              <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src={{ asset('assets/images/water-house.svg')}} alt="Image 3" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="text-sm text-orange-500">Real Estate</span><span> | January 19, 2024</span>
                  <h3 class="text-md font-semibold">How to build a scalable customer service team structure</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="bg-white container-fluid">
      <div class="container mx-auto py-14 justify-center">
        <div class="flex items-center justify-center space-x-4">
          <h3 class="text-xl font-bold text-orange-500">Other Topics:</h3>
          <div class="flex space-x-2">
            <div class="bg-violet-950 text-white rounded px-4 py-2">Comparisons</div>
            <div class="bg-violet-950 text-white rounded px-4 py-2">Small business</div>
            <div class="bg-violet-950 text-white rounded px-4 py-2">VoIP</div>
            <div class="bg-violet-950 text-white rounded px-4 py-2">Productivity</div>
            <div class="bg-violet-950 text-white rounded px-4 py-2">Best practices</div>
          </div>
        </div>
      </div>
    </div>




    @include('front.partials.footer')
@endsection
@push('scripts')
<script>
    const track = document.querySelector('.slider-track');
    const items = document.querySelectorAll('.slider-item');
    const nextButton = document.querySelector('.slider-button-next');
    const prevButton = document.querySelector('.slider-button-prev');
    let index = 0;

    function updateSlider() {
      const width = items[0].clientWidth;
      track.style.transform = `translateX(-${index * width}px)`;
    }

    nextButton.addEventListener('click', () => {
      if (index < items.length - 3) {  // Show 3 items at a time
        index++;
      } else {
        index = 0;
      }
      updateSlider();
    });

    prevButton.addEventListener('click', () => {
      if (index > 0) {
        index--;
      } else {
        index = items.length - 3;  // Show 3 items at a time
      }
      updateSlider();
    });

    window.addEventListener('resize', updateSlider);
  </script>
  @endpush
