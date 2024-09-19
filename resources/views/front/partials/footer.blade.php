<!-- Footer Section -->
<footer class="bg-violet-950 text-white md:py-12 py-5">
    <div class="container xl:container-xl mx-auto px-4">
        <div class="lg:flex lg:justify-between ">
            <div class="lg:py-6 lg:w-1/2 w-full">
                <h2 class="text-2xl md:text-4xl mb-0 md:mb-4 text-gray-100 lg:border-r-2 lg:pr-32 md:pr-20 pr-5">Let's Start to find Best Business</h2>
            </div>
            <div class="mb-6 lg:mb-0 p-0 lg:p-2 lg:w-1/2 w-full lg:flex lg:justify-end">
                <div>
                    <h3 class="text-lg md:mb-0 md:mr-4 text-gray-300 lg:pb-3">Join Our Newsletter</h3>
                    <form id="subscribeForm" class="flex flex-col md:flex-row items-start md:items-center space-y-2 lg:space-y-0">
                        @csrf
                        <input type="email" name="email" id="email" placeholder="Your Email" class="w-full md:w-80 p-2 rounded-sm focus:outline-none text-gray-800 md:mr-4">
                        <button type="submit" class="bg-orange-500 rounded-sm px-4 py-2  md:ml-5 lg:ml-0">Subscribe</button>
                    </form>
                    <div id="message" class="mt-4 text-green-400"></div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mt-7">
            <!-- First Column -->
            <div class="col-span-1 md:col-span-4 lg:col-span-5 md:pr-16 lg:pr-16">
                <div class="relative">
                    <img src="{{ asset('front/assets/images/footer-logo.svg') }}" alt="Logo" class="mb-4 w-10 h-12">
                    <p class="text-sm">Nullo eleifend pulvinar purus, malesuada euismod odio imperdiet. Ut sit amet erat nec nibh rhoncus varius in non lorem. Donec interdum, lectus in convallis.</p>
                </div>
            </div>

            <!-- Second Column -->
            <div class="col-span-1 md:col-span-2 lg:col-span-2">
                <div class="flex md:justify-center justify-start">
                    <ul class="lg:pl-0 pl-0">
                        <li class="mb-2">Countries</li>
                        <li class="mb-2">Regions</li>
                        <li class="mb-2">Cities</li>
                        <li class="mb-2">Districts</li>
                        <li class="mb-2">Hotels</li>
                    </ul>
                </div>
            </div>

            <!-- Third Column -->
            <div class="col-span-1 md:col-span-6 lg:col-span-5">
                <div class="flex flex-col md:flex-row justify-end space-y-4 md:space-y-0 md:space-x-8">
                    <div class="relative">
                        <ul>
                            <li class="mb-2">Unique places to stay</li>
                            <li class="mb-2">Reviews</li>
                            <li class="mb-2">Discover monthly stays</li>
                            <li class="mb-2">Unpacked: Travel articles</li>
                            <li class="mb-2">Seasonal and holiday deals</li>
                            <li class="mb-2">Traveller Review Awards</li>
                        </ul>
                    </div>
                    <div class="relative">
                        <ul>
                            <li class="mb-2">About Us</li>
                            <li class="mb-2">Customer Service Help</li>
                            <li class="mb-2">Partner help</li>
                            <li class="mb-2">Careers</li>
                            <li class="mb-2">Sustainability</li>
                            <li class="mb-2">Terms & Conditions</li>
                            <li class="mb-2">How We Work</li>
                            <li class="mb-2">Privacy & cookie statement</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center border-t border-gray-700 py-4 mt-8">
            <p class="text-sm">Copyright &copy; 2024, All rights reserved.</p>
            <div class="flex w-full md:w-auto justify-between md:justify-normal md:space-x-4 space-x-2 mt-4 md:mt-0">
                <a href="#" class="text-xs md:text-base hover:underline">Terms of Use</a>
                <a href="#" class="text-xs md:text-base hover:underline">Privacy Policy</a>
                <a href="#" class="text-xs md:text-base hover:underline">Help Center</a>
            </div>
            <div class="flex space-x-4 p-4 md:mt-0">
                <ul class="flex justify-center space-x-5">
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=61562950513083" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-6 h-6 md:w-10 md:h-10" fill="white"  viewBox="0 0 24 24" aria-hidden="true"> 4
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/traspasalo.es/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-6 h-6 md:w-10 md:h-10" fill="white" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.tiktok.com/@traspasalo.es" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400"> 
                            <svg class="w-6 h-6 md:w-10 md:h-10" fill="white" viewBox="0 0 50 50">
                                <path d="M 9 4 C 6.2495759 4 4 6.2495759 4 9 L 4 41 C 4 43.750424 6.2495759 46 9 46 L 41 46 C 43.750424 46 46 43.750424 46 41 L 46 9 C 46 6.2495759 43.750424 4 41 4 L 9 4 z M 9 6 L 41 6 C 42.671576 6 44 7.3284241 44 9 L 44 41 C 44 42.671576 42.671576 44 41 44 L 9 44 C 7.3284241 44 6 42.671576 6 41 L 6 9 C 6 7.3284241 7.3284241 6 9 6 z M 26.042969 10 A 1.0001 1.0001 0 0 0 25.042969 10.998047 C 25.042969 10.998047 25.031984 15.873262 25.021484 20.759766 C 25.016184 23.203017 25.009799 25.64879 25.005859 27.490234 C 25.001922 29.331679 25 30.496833 25 30.59375 C 25 32.409009 23.351421 33.892578 21.472656 33.892578 C 19.608867 33.892578 18.121094 32.402853 18.121094 30.539062 C 18.121094 28.675273 19.608867 27.1875 21.472656 27.1875 C 21.535796 27.1875 21.663054 27.208245 21.880859 27.234375 A 1.0001 1.0001 0 0 0 23 26.240234 L 23 22.039062 A 1.0001 1.0001 0 0 0 22.0625 21.041016 C 21.906673 21.031216 21.710581 21.011719 21.472656 21.011719 C 16.223131 21.011719 11.945313 25.289537 11.945312 30.539062 C 11.945312 35.788589 16.223131 40.066406 21.472656 40.066406 C 26.72204 40.066409 31 35.788588 31 30.539062 L 31 21.490234 C 32.454611 22.653646 34.267517 23.390625 36.269531 23.390625 C 36.542588 23.390625 36.802305 23.374442 37.050781 23.351562 A 1.0001 1.0001 0 0 0 37.958984 22.355469 L 37.958984 17.685547 A 1.0001 1.0001 0 0 0 37.03125 16.6875 C 33.886609 16.461891 31.379838 14.012216 31.052734 10.896484 A 1.0001 1.0001 0 0 0 30.058594 10 L 26.042969 10 z M 27.041016 12 L 29.322266 12 C 30.049047 15.2987 32.626734 17.814404 35.958984 18.445312 L 35.958984 21.310547 C 33.820114 21.201935 31.941489 20.134948 30.835938 18.453125 A 1.0001 1.0001 0 0 0 29 19.003906 L 29 30.539062 C 29 34.707538 25.641273 38.066406 21.472656 38.066406 C 17.304181 38.066406 13.945312 34.707538 13.945312 30.539062 C 13.945312 26.538539 17.066083 23.363182 21 23.107422 L 21 25.283203 C 18.286416 25.535721 16.121094 27.762246 16.121094 30.539062 C 16.121094 33.483274 18.528445 35.892578 21.472656 35.892578 C 24.401892 35.892578 27 33.586491 27 30.59375 C 27 30.64267 27.001859 29.335571 27.005859 27.494141 C 27.009759 25.65271 27.016224 23.20692 27.021484 20.763672 C 27.030884 16.376775 27.039186 12.849206 27.041016 12 z"></path>
                                </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
<script>
    document.getElementById('subscribeForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let form = this;
        let email = document.getElementById('email').value;
        let messageDiv = document.getElementById('message');

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
            console.error('Error:', error);
            messageDiv.innerHTML = `<span class="text-red-500">Email Already subscribed.</span>`;
        });
    });
</script>
@endpush