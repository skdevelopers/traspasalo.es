<div class="mb-4">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-span-12">
        <label for="name" class="block text-sm font-medium text-gray-700">name</label>
        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="name" name="name" value="{{ old('name', $featureService->name ?? '') }}" required>
    </div>
    <div class="col-span-12">
        <label for="name" class="block text-sm font-medium text-gray-700">Icon Class</label>
        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="icon_class" name="icon_class" value="{{ old('name', $featureService->icon_class ?? '') }}" required>
    </div>
</div>
