@extends('layouts.vertical', ['title' => 'Display Subscribers', 'sub_title' => 'Subscribers'])


@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Subscribers</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <a href="{{ route('subscribers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6 inline-block">
            Add New Subscriber
        </a>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase">Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscribers as $subscriber)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 border-b border-gray-200">{{ $subscriber->email }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">
                            <a href="{{ route('subscribers.edit', $subscriber->id) }}" class="text-yellow-500 hover:text-yellow-700 font-bold py-1 px-3 rounded">Edit</a>
                            <form action="{{ route('subscribers.destroy', $subscriber->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold py-1 px-3 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
