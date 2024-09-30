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
    @media screen and (max-width: 540px){
      .slider-item {
        flex: 0 0 100%;
        max-width: 100%;
      }
    }
  </style>
@endpush

@section('content')
    @include('front.partials.banner')

    <div class="bg-white flex items-center justify-center min-h-screen">
        <div class="container xl:container-xl px-4 mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 pt-12 pb-5">
            <!-- Card 1 -->
            @foreach($blogs as $blog)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
              <img src="{{ url($blog->getFirstMediaUrl('blogs')) }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover">
                <div class="p-6">
                    <span class="block text-blue-500 text-sm mb-2">{{ $blog->date }}</span>
                    <h3 class="text-xl font-bold mb-2">{{ $blog->title }}</h3>
                    <span class="text-gray-600 mb-4 line-clamp-2">{!! $blog->description !!}.</span>
                    <a href="{{ route('blogs.show', $blog->id) }}" class="text-orange-500 hover:underline">{{ translate('Read More') }} &rarr;</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="bg-white container-fluid">
        <div class="bg-white flex items-center justify-center min-h-screen">
            <div class="w-full  max-w-full mx-auto grid grid-cols-1 md:grid-cols-2  bg-white">
                <!-- Text Section -->
                <div class="bg-pink-100 px-4 md:px-20 py-10 md:py-0 flex flex-col justify-center">
                    <span class="text-red-500 font-semibold mb-2">{{ translate('Featured topic') }}</span>
                    <h1 class="text-4xl font-bold mb-4">{{ translate('Productivity') }}</h1>
                    <p class="text-gray-700 mb-6">{{ translate('Discover insights, tips, and strategies to boost your professional productivity and efficiency. From cutting down emails to automating your team\'s workflow.') }}</p>
                    <a href="#" class="text-red-500 hover:underline">{{ translate('Browse posts') }} &rarr;</a>
                </div>
                <!-- Image Section -->
                <div class="bg-orange-500  flex items-center justify-center">
                    <img src={{asset('front/assets/images/3D-cubes.svg')}} alt="{{ translate('Productivity Image') }}" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white container-fluid">
      <div class="container mx-auto py-14 md:justify-center justify-start">
        <div class="md:flex items-center justify-center space-x-4">
          <h3 class="block text-xl font-bold text-orange-500 mb-2 md:mb-0">{{ translate('Other Topics') }}:</h3>
          <div class="grid grid-cols-2 md:flex md:space-x-2 m-0">
            <div class="bg-violet-950 text-white rounded text-center md:text-left mt-1 md:mt-0 md:px-4 py-2 whitespace-nowrap ml-1 md:ml-0">{{ translate('Comparisons') }}</div>
            <div class="bg-violet-950 text-white rounded text-center md:text-left mt-1 md:mt-0 md:px-4 py-2 whitespace-nowrap ml-1 md:ml-0">{{ translate('Small business') }}</div>
            <div class="bg-violet-950 text-white rounded text-center md:text-left mt-1 md:mt-0 md:px-4 py-2 whitespace-nowrap ml-1 md:ml-0">{{ translate('VoIP') }}</div>
            <div class="bg-violet-950 text-white rounded text-center md:text-left mt-1 md:mt-0 md:px-4 py-2 whitespace-nowrap ml-1 md:ml-0">{{ translate('Productivity') }}</div>
            <div class="bg-violet-950 text-white rounded text-center md:text-left mt-1 md:mt-0 md:px-4 py-2 whitespace-nowrap ml-1 md:ml-0">{{ translate('Best practices') }}</div>
          </div>
        </div>
      </div>
    </div>

    @include('front.partials.footer')
@endsection

@push('scripts')
<script>
  // Fetch data from '/blogsAlljson' API
  async function fetchBlogs() {
      try {
          const response = await fetch('/blogsAlljson');
          const data = await response.json();

          if (data && data.blogs) {
              const track = document.getElementById('sliderTrack');
              track.innerHTML = ''; // Clear the slider track before appending new items
              
              data.blogs.forEach(blog => {
                  // Create a new slider item
                  const sliderItem = document.createElement('div');
                  sliderItem.classList.add('slider-item', 'p-2');

                  // Add blog content to the slider item
                  sliderItem.innerHTML = `
                      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                          <img src="${blog.image_url}" alt="${blog.title}" class="w-full h-48 object-cover">
                          <div class="p-4">
                              <h3 class="text-md font-semibold"><a :href="'/blogs/' + ${blog.id}">${blog.title}</a></h3>
                          </div>
                      </div>
                  `;
                  
                  // Append the new slider item to the track
                  track.appendChild(sliderItem);
              });

              initializeSlider(); // Re-initialize the slider after adding new items
          }
      } catch (error) {
          console.error('Error fetching blogs:', error);
      }
  }

  // Initialize the slider functionality
  function initializeSlider() {
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
          if (index < items.length - 3) { // Show 3 items at a time
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
              index = items.length - 3; // Show 3 items at a time
          }
          updateSlider();
      });

      window.addEventListener('resize', updateSlider);
      updateSlider(); // Call it initially
  }

  // Fetch blogs data and initialize the slider on page load
  document.addEventListener('DOMContentLoaded', function () {
      fetchBlogs();
  });
</script>
  @endpush
