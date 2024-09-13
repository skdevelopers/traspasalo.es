@extends('front.layouts.app')

@section('title', 'Newsletter')
@section('header-title', 'Newsletter')
@section('header-subtitle', '')


@section('content')
    @include('front.partials.banner')
    <!-- Section with Images and Text -->
    <div class="py-20 bg-white">
        <div class="relative container xl:container-xl px-4 mx-auto bg-white">
            <div class="grid grid-cols-12">
                <!-- Main image on the left -->
                <div class="col-span-12 lg:col-span-7">
                    <img src="{{ asset('/front/assets/images/dream-business.jpg') }}" alt="Main Image"
                        class="w-full h-auto object-cover rounded-lg">
                </div>
                <!-- Text and smaller images on the right -->
                <div class="col-span-12 lg:col-span-5 pr-10 relative">
                    <h2 class="text-5xl font-bold text-orange-500">5 </h2><span class="text-base text-black">STARS</span>
                    <h3 class="text-4xl font-semibold mt-4 text-black">Your Dream Business, Our Commitment to Find</h3>
                    <p class="mt-4 text-sm">
                        We go beyond simply locating premises. We are dedicated to uncovering and securing the perfect
                        business opportunities tailored to your needs. Our expertise and commitment ensure that your path to
                        business success is clear and achievable. Let us help you find not just a place, but the ideal
                        environment where your business can thrive.
                    </p>
                    <form id="subscribeForm3"
                        class="flex flex-col py-2 md:flex-row items-start md:items-center mt-5 gap-2">
                        @csrf
                        <input type="email" name="email" id="email" placeholder="Your Email"
                            class="w-full md:w-80 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-500 text-gray-800">
                        <button type="submit"
                            class="bg-violet-900 text-white rounded-md px-6 py-3 font-semibold shadow-md hover:bg-violet-700 transition-colors duration-300">Subscribe</button>
                    </form>

                    <div id="message3" class="mt-4 text-green-400"></div>
                    <div class="flex justify-end mt-4">
                        <!-- Two smaller images below -->
                        <div class="flex w-auto h-auto lg:w-[340px] lg:h-[180px] gap-4 lg:absolute lg:right-0 lg:bottom-7">
                            <img src="{{ asset('/front/assets/images/image.png') }}" alt="Small Image 2"
                                class="w-full h-full object-cover rounded-lg">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('front.partials.footer')
@endsection
@push('scripts')
<script>
    document.getElementById('subscribeForm2').addEventListener('submit', function(e) {
        e.preventDefault();

        let form = this;
        let email = document.getElementById('email').value;
        let messageDiv = document.getElementById('message2');

        fetch("{{ route('subscribe') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                email: email
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                messageDiv.innerHTML = `<span class="text-red-500">${data.errors.email[0]}</span>`;
            } else {
                messageDiv.innerHTML = `<span class="text-green-500">${data.success}</span>`;
                form.reset();
            }
        })
        .catch(error => {
            //console.error('Error:', error);
            messageDiv.innerHTML = `<span class="text-red-500">Email Already subscribed.</span>`;
        });
    });
</script>
@endpush
