<!-- services.blade.php -->
<div class="mx-auto bg-white p-4 rounded-lg shadow-md">
    <form>
        <!-- Business Category -->
        <div class="mb-4">
            <label for="business-category" class="block text-gray-700">Business Category</label>
            <select id="business-category" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option>Select</option>
                <!-- Add your options here -->
            </select>
        </div>
        
        <!-- Business Title -->
        <div class="mb-4">
            <label for="business-title" class="block text-gray-700">Business Title</label>
            <input type="text" id="business-title" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" placeholder="Business title">
        </div>
        
        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" placeholder="Write here..."></textarea>
        </div>
        
        <!-- Check In and Check Out -->
        <div class="mb-4 flex space-x-4">
            <div class="w-1/2">
                <label for="check-in" class="block text-gray-700">Check In</label>
                <select id="check-in" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    <option>Check in time</option>
                    <!-- Add your options here -->
                </select>
            </div>
            <div class="w-1/2">
                <label for="check-out" class="block text-gray-700">Check Out</label>
                <select id="check-out" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                    <option>Checkout time</option>
                    <!-- Add your options here -->
                </select>
            </div>
        </div>
        
        <!-- Age Restriction -->
        <div class="mb-4">
            <label for="age-restriction" class="block text-gray-700">Age Restriction</label>
            <select id="age-restriction" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option>Select</option>
                <!-- Add your options here -->
            </select>
        </div>
        
        <!-- Pets Permission -->
        <div class="mb-4">
            <label for="pets-permission" class="block text-gray-700">Pets Permission</label>
            <select id="pets-permission" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500">
                <option>Select</option>
                <!-- Add your options here -->
            </select>
        </div>

        <!-- Add Property Images -->
        <!-- Add Property Images -->
        <div class="mb-4">
            <label for="property-images" class="block text-gray-700">Add property images* <span class="text-gray-500 text-sm">(0/10)</span></label>
            <div class="grid grid-cols-5 gap-2">
                <!-- Placeholder buttons for image uploads -->
                
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button type="button" class="w-full h-20 border-2  border-red-300 bg-red-50 flex items-center justify-center rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
            </div>
        </div>

        
        <!-- Property Location -->
        <div class="mb-4">
            <label for="property-location" class="block text-gray-700">Property Location</label>
            <input type="text" id="property-location" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500" placeholder="Search Location">
        </div>
        
        <!-- Add On Map -->
        <div class="mb-4">
            <label class="block text-gray-700">Add On Map</label>
            <div class="w-full h-64 bg-gray-200 rounded-md overflow-hidden">
                <!-- Placeholder for map. Replace with actual map implementation -->
                <img src={{asset('/front/assets/images/passenger-plane-airport-near-terminal-stands-concept-flight-airport-vacation.svg')}} alt="Map placeholder" class="w-auto h-full  object-cover">
            </div>
        </div>

        <!-- Select Features Services -->
        <div class="mb-4">
            <label for="features-services" class="block text-gray-700">Select Features Services</label>
            <div class="flex flex-wrap gap-2">
                <!-- Feature buttons -->
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Accessibility +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Hot water +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Heating +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Air-conditioning +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Fully equipped +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Kitchen +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Working +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Abroad +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Corner +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    License +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Security door +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Smoke outlet +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Alarm system +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Alcohol license +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Store +
                </button>
                <button type="button" class="px-4 py-2 border border-purple-500 text-purple-500 rounded-full hover:bg-purple-100 focus:outline-none">
                    Terrace +
                </button>
                <!-- Add more buttons as needed -->
            </div>
        </div>
    </form>
</div>
