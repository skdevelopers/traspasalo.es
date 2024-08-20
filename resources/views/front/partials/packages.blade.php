<!-- resources/views/front/partials/packages.blade.php -->
<div class="grid grid-cols-1 gap-6 md:grid-cols-3">
    @foreach($packages as $package)
    <div class="bg-white p-8 rounded-lg shadow-lg text-left border-2">
        <h3 class="text-xl font-bold mb-4">{{ $package->name }}</h3>
        <p class="text-gray-600 mb-6">The essentials to get you and your team up and running</p>
        <div class="p-2 align-super text-superscript text-xl text-gray-600 font-bold">
            $<span class="text-5xl">{{ $package->getPrice($billingCycle) }}</span>
            <span class="align-super text-superscript text-gray-600 text-sm"> per {{ $billingCycle }}</span>
        </div>
        <button class="bg-white text-gray-600 py-2 px-12 rounded-lg mb-6 border-2" disabled>You are here</button>
        <div class="text-left">
            <h1 class="text-md font-semibold">All plan Include:</h1>
            <ul class="space-y-2 pt-2">
                @foreach($package->getDescription($billingCycle) as $description)
                <li class="flex items-center"><span class="text-black mr-2">✔</span>{{ $description }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
