@extends('front.layouts.app')

@section('title', 'About US')
@section('header-title', 'About Us')
@section('header-subtitle', '')

@push('styles')
    <style>
        .slider-container {
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }
    </style>
@endpush

@section('content')
    @include('front.partials.banner')

    <div class="bg-white min-h-screen max-w-full">
        <div class="container xl:container-xl px-4">
            <div class="grid grid-cols-12 py-5 md:py-20 items-center gap-4">
                <!-- Text Section -->
                <div class="py-10 col-span-12 md:col-span-6 lg:col-span-5 pl-3">
                    <h1 class="text-2xl font-bold mb-6">Find The Best Accommodation</h1>
                    <p class="mb-6 text-sm">
                        Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.
                        Nullam et maximus lorem. Suspendisse maximus dolor quis consequat volutpat. Donec vehicula elit eu
                        erat pulvinar, vel congue ex egestas. Praesent egestas purus dui, a porta arcu pharetra quis. Sed
                        vestibulum semper ligula, id accumsan orci ornare ut. Donec id pharetra nunc, sit amet sollicitudin
                        mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Aliquam dapibus nisl at diam scelerisque luctus. Nam mattis, velit in malesuada maximus, erat ligula
                        eleifend eros, et lacinia nunc ante vel odio.
                    </p>
                    <p class="text-sm">
                        Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel malesuada velit.
                        Nullam et maximus lorem. Suspendisse maximus dolor quis consequat volutpat. Donec vehicula elit eu
                        erat pulvinar, vel congue ex egestas. Praesent egestas purus dui, a porta arcu pharetra quis. Sed
                        vestibulum semper ligula, id accumsan orci ornare ut. Donec id pharetra nunc, sit amet sollicitudin
                        mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Aliquam dapibus nisl at diam scelerisque luctus. Nam mattis, velit in malesuada maximus, erat ligula
                        eleifend eros, et lacinia nunc ante vel odio.
                    </p>
                </div>

                <!-- Image Section -->
                <div class="col-span-12 md:col-span-6 lg:col-span-7 py-20">
                    <div class="relative flex justify-end">
                        <div class="bg-orange-100 rounded-lg w-40 h-40 absolute right-0 top-0"></div>
                        <div class="relative z-10 pr-10 pl-16 pt-20">
                            <img src="{{ asset('front/assets/images/mirror-room.svg') }}" alt="Main Image"
                                class="w-[580px] rounded-lg">
                        </div>
                        <div class="absolute left-0 bottom-0 z-10 transform translate-y-1/2">
                            <img src="{{ asset('front/assets/images/bed-room.svg') }}" alt="Small Image"
                                class="w-[200px] rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- we offer  --}}
    <div class="container ">
        <div class="flex-col items-center justify-center flex px-3 md:px-20 py-10">
            <div class="text-center mb-12 w-full md:w-2/3">
                <h2 class="text-3xl font-bold mb-4">What We Offers</h2>
                <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero, vel
                    malesuada velit. Nullam et maximus lorem. Suspendisse maximus dolor quis consequat volutpat.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4">
                        <img src="{{ asset('front/assets/icons/low-rate.png') }}" alt="Low Rates" class="mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Low Rates</h3>
                    <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero,
                        vel malesuada velit.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4">
                        <img src="{{ asset('front/assets/icons/booking-reservation-icon.png') }}" alt="No Reservation Fees"
                            class="mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">No Reservation Fees</h3>
                    <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero,
                        vel malesuada velit.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4">
                        <img src="{{ asset('front/assets/icons/secure-booking.png') }}" alt="Secure Booking" class="mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Secure Booking</h3>
                    <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero,
                        vel malesuada velit.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4">
                        <img src="{{ asset('front/assets/icons/24-hours-phone-support-icon.png') }}" alt="24/7 Support"
                            class="mx-auto">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Praesent eu dolor eu orci vehicula euismod. Vivamus sed sollicitudin libero,
                        vel malesuada velit.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- silder for clients --}}
    <div class="bg-violet-950 p-10">
    <div x-data="slider()" class="relative container xl:container-xl max-w-5xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center pt-10">Our Clients Success Stories</h2>
        <p class="text-center text-white mb-4 pb-10">Discover the experiences of those who have achieved success with us</p>
        
        <div class="relative overflow-hidden py-20">
            <div id="slider" class="flex transition-transform duration-500 space-x-8"
                :style="{ 'transform': `translateX(-${currentIndex * (100 / itemsPerPage)}%)` }">
                <template x-for="(item, index) in items" :key="index">
                    <div
                        class="bg-white text-black p-6 rounded-lg shadow-lg w-[92%] sm:w-[47%] lg:w-[30.5%]  flex-shrink-0">
                        <p class="mb-4" x-text="item.description"> </p>
                        <div class="flex items-center pt-5">
                            <img :src="item.image_url" alt="User Image" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h3 class="font-semibold" x-text="item.name"></h3>
                                <p class="text-gray-600" x-text="item.job_position"></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="absolute top-0 right-0 flex space-x-2 mt-4 mr-4">
                <button @click="prev" class=" text-gray-300 border-gray-300 border-2 rounded-lg p-2 shadow-lg z-10">
                    &larr;
                </button>
                <button @click="next" class="text-gray-300 border-gray-300 border-2 rounded-lg p-2 shadow-lg z-10">
                    &rarr;
                </button>
            </div>

        </div>
    
       
    </div>
</div> 
    
    <!-- Frequently Asked Questions -->
    <section class="text-black py-16">
        <div class="container flex flex-col justify-center mx-auto">
            <h2 class=" text-2xl font-bold leadi text-center sm:text-xl">Frequently Asked Questions</h2>
            <h2 class="mb-12 text-sm  text-center sm:text-sm">Discover the experiences of those who have achieved success
                with us</h2>
            <div class="flex flex-col divide-y sm:px-8 lg:px-12 xl:px-32 divide-gray-700">
                <ul class="basis-1/2" id="faq-list">
                    
                </ul>
            </div>
        </div>
    </section>


    @include('front.partials.footer')
@endsection

@push('scripts')
<script>
           function slider() {
    return {
        currentIndex: 0,
        items: [],
        prev() {
            if (this.currentIndex > 0) {
                this.currentIndex--;
            }
        },
        next() {
            if (this.currentIndex < this.totalSlides - 1) {
                this.currentIndex++;
            }
        },
        get itemsPerPage() {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 640) return 2;
            return 1;
        },
        get totalSlides() {
            return Math.ceil(this.items.length / this.itemsPerPage);
        },
        init() {
            fetch('/api/customers')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    this.items = data;
                    console.log(this.items);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }
    }
}

        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
            content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
        }
    </script>

<script>
    // Fetch the FAQ data
    async function fetchFAQs() {
        try {
            const response = await fetch('/faqsJson'); // Replace with your actual endpoint
            const faqs = await response.json();
            renderFAQs(faqs);
        } catch (error) {
            console.error('Error fetching FAQs:', error);
        }
    }

    // Render the FAQ items
    function renderFAQs(faqs) {
        const faqList = document.getElementById('faq-list');
        faqList.innerHTML = ''; // Clear existing content

        faqs.forEach(faq => {
            const listItem = document.createElement('li');
            listItem.innerHTML = `
                <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                    <span class="flex-1 text-base-content">${faq.question}</span>
                    <svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 27.25C21.3178 27.25 27.25 21.3178 27.25 14C27.25 6.68223 21.3178 0.75 14 0.75C6.68223 0.75 0.75 6.68223 0.75 14C0.75 21.3178 6.68223 27.25 14 27.25Z" stroke="black" stroke-width="1.5" />
                        <path d="M15.581 13.527L15.581 7.39217C15.5928 7.24103 15.5732 7.08908 15.5235 6.94586C15.4738 6.80264 15.395 6.67125 15.2921 6.55992C15.1892 6.4486 15.0644 6.35975 14.9255 6.29895C14.7866 6.23815 14.6367 6.20672 14.4851 6.20662C14.3335 6.20652 14.1835 6.23776 14.0445 6.29838C13.9056 6.359 13.7806 6.44769 13.6776 6.55888C13.5745 6.67007 13.4956 6.80137 13.4457 6.94452C13.3958 7.08767 13.376 7.2396 13.3876 7.39076L13.3876 13.5256L7.25273 13.5256C6.97465 13.5447 6.71418 13.6686 6.52394 13.8723C6.3337 14.076 6.22789 14.3443 6.22789 14.623C6.22789 14.9018 6.3337 15.1701 6.52394 15.3738C6.71418 15.5775 6.97465 15.7014 7.25273 15.7205L13.3876 15.7205L13.3876 21.8553C13.376 22.0065 13.3958 22.1584 13.4457 22.3016C13.4956 22.4447 13.5745 22.576 13.6776 22.6872C13.7806 22.7984 13.9056 22.8871 14.0445 22.9477C14.1835 23.0083 14.3335 23.0396 14.4851 23.0395C14.6367 23.0394 14.7866 23.0079 14.9255 22.9471C15.0644 22.8863 15.1892 22.7975 15.2921 22.6862C15.395 22.5748 15.4738 22.4435 15.5235 22.3002C15.5732 22.157 15.5928 22.0051 15.581 21.8539L15.5832 15.7212L21.7159 15.7191C21.9904 15.6956 22.2462 15.57 22.4326 15.3671C22.6189 15.1641 22.7224 14.8986 22.7224 14.623C22.7224 14.3475 22.6189 14.082 22.4326 13.879C22.2462 13.6761 21.9904 13.5505 21.7159 13.527H15.581Z" fill="black" />
                    </svg>
                </button>
                <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                    <div class="pb-5 leading-relaxed">
                        <div class="space-y-2 leading-relaxed">${faq.answer}</div>
                    </div>
                </div>
            `;
            faqList.appendChild(listItem);
        });
    }

    // Call the fetch function on page load
    window.onload = fetchFAQs;
</script>

@endpush
