@extends('front.layouts.app')

@section('title', 'Simple & flexible pricing')
@section('header-title', 'Simple & flexible pricing')
@section('header-subtitle', '')


@section('content')
    @include('front.partials.banner')

    <div class="bg-white">
        <div class="container xl:container-xl px-4 mx-auto py-10 md:py-20">
            @if (session('plan_msg'))
                <span class="text-red-600 text-2xl">{{ session('plan_msg') }}</span>
            @endif
            <!-- Tab Switcher -->
            <div class="text-center mb-8">
                <div class="inline-block bg-gray-200 rounded-full p-1">
                    <button id="monthly-btn"
                        class="tab-button active px-3 py-2 bg-orange-500 text-white rounded-full focus:outline-none"
                        onclick="toggleTab('monthly')">Monthly</button>
                    <button id="yearly-btn" class="tab-button px-3 py-2 text-gray-600 rounded-full focus:outline-none"
                        onclick="toggleTab('yearly')">Yearly</button>
                </div>
            </div>

            <!-- Pricing Cards -->
            <div id="packages-container" class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach ($packages as $package)
                    <div class="bg-white p-8 rounded-lg shadow-lg text-left border-2">
                        <h3 class="text-xl font-bold mb-4">{{ $package->name }}</h3>
                        <p class="text-gray-600 mb-6">The essentials to get you and your team up and running</p>
                        <div class="p-2 align-super text-superscript text-xl text-gray-600 font-bold">
                            $<span class="text-5xl">{{ $package->getPrice($billingCycle) }}</span>
                            <span class="align-super text-superscript text-gray-600 text-sm"> per {{ $billingCycle }}</span>
                        </div>
                        <button class="bg-white text-gray-600 py-2 px-12 rounded-lg mb-6 border-2" disabled>You are
                            here</button>
                        <div class="text-left">
                            <h1 class="text-md font-semibold">All plan Include:</h1>
                            <ul class="space-y-2 pt-2">
                                @foreach ($package->getDescription($billingCycle) as $description)
                                    <li class="flex items-center"><span class="text-black mr-2">✔</span>{{ $description }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- we offer  --}}
    <div class="container xl:container-xl">
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
                        <img src="{{ asset('front/assets/icons/secure-booking.png') }}" alt="Secure Booking"
                            class="mx-auto">
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


    @include('front.partials.footer')
@endsection
@push('scripts')
    <script>
        function toggleTab(selected) {
            const monthlyBtn = document.getElementById('monthly-btn');
            const yearlyBtn = document.getElementById('yearly-btn');

            if (selected === 'monthly') {
                monthlyBtn.classList.add('bg-orange-500', 'text-white');
                monthlyBtn.classList.remove('text-gray-600');
                yearlyBtn.classList.remove('bg-orange-500', 'text-white');
                yearlyBtn.classList.add('text-gray-600');
            } else if (selected === 'yearly') {
                yearlyBtn.classList.add('bg-orange-500', 'text-white');
                yearlyBtn.classList.remove('text-gray-600');
                monthlyBtn.classList.remove('bg-orange-500', 'text-white');
                monthlyBtn.classList.add('text-gray-600');
            }

            // Make an AJAX request to fetch the packages
            fetch(`{{ route('price') }}?billing_cycle=${selected}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const packagesContainer = document.getElementById('packages-container');

                    let buttonHtml = '';




                    packagesContainer.innerHTML = ''; // Clear the current packages

                    data.packages.forEach(package => {

                        switch (package.name) {
                            case 'Free Account':
                                buttonHtml =
                                    '<button class="w-3/4 bg-gray-500 text-white text-xl py-2 px-12 rounded-lg mb-6 border-2" disabled>You are here</button>';
                                break;
                            case 'Silver Account':
                                buttonHtml =
                                    '<button class="w-3/4 bg-violet-900 text-white text-xl py-2 px-12 rounded-lg mb-6 border-2">Buy</button>';
                                break;
                            default:
                                buttonHtml =
                                    '<button class="w-3/4 bg-orange-600 text-white text-xl py-2 px-12 rounded-lg mb-6 border-2">Buy</button>';
                                break;
                        }



                        const packageHtml = `
                <div class="bg-white p-8 rounded-lg shadow-lg text-center border-2">
                    <h3 class="text-xl font-bold mb-4">${package.name}</h3>
                    <p class="text-gray-600 mb-6">The essentials to get you and your team up and running</p>
                    <div class="p-2 align-super text-superscript text-xl text-gray-600 font-bold">
                        $<span class="text-5xl">${package[`${data.billingCycle}_price`]}</span>
                        <span class="align-super text-superscript text-gray-600 text-sm"> per ${data.billingCycle}</span>
                    </div>
                    <form action="{{ route('subscription.checkout') }}" method="POST" id="plan-form">
                        @csrf
                        <input type="hidden" name="plan" value="${package.name} ${data.billingCycle}">
                        <input type="hidden" name="amount" value="${package[`${data.billingCycle}_price`]}">

                        ${buttonHtml}
                   </form>

                   
                    <div class="text-left">
                        <h1 class="text-md font-semibold">All plan Include:</h1>
                        <ul class="space-y-2 pt-2">
                            ${package[`${data.billingCycle}_description`].map(description => `
                                                                    <li class="flex items-center"><span class="text-black mr-2">✔</span>${description}</li>
                                                                `).join('')}
                        </ul>
                    </div>
                </div>
            `;
                        packagesContainer.insertAdjacentHTML('beforeend', packageHtml);
                    });
                });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const billingCycle = '{{ $billingCycle }}';
            toggleTab(billingCycle); // Initialize the correct tab on page load
        });
    </script>
@endpush
