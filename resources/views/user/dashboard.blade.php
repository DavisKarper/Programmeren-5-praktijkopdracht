<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between content-center">
                    <h2 class="text-2xl font-bold dark:text-white">Your items:</h2>
                    @if (Auth::user()->verified == 1)
                        <a href="{{ route('items.create') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Create new item
                        </a>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr class="border-b dark:border-gray-700">
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Image</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Name</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Rarity</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Type</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Created At</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Updated At</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Verified</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usersItems as $userItem)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-2">
                                        <img class="w-24 h-24 object-cover"
                                            src="@if ($userItem->image === null) {{ asset('storage/' . $userItem->type->image) }} @else {{ asset('storage/' . $userItem->image) }} @endif"
                                            alt="{{ $userItem->name }}">
                                    </td>
                                    <td class="px-4 py-2">{{ $userItem->name }}</td>
                                    <td class="px-4 py-2">{{ $userItem->rarity->name }}</td>
                                    <td class="px-4 py-2">{{ $userItem->type->name }}</td>
                                    <td class="px-4 py-2">{{ $userItem->created_at }}</td>
                                    <td class="px-4 py-2">{{ $userItem->updated_at }}</td>
                                    <td class="px-4 py-2">
                                        @if ($userItem->verified === 0)
                                            <span class="text-red-500 font-semibold">No</span>
                                        @else
                                            <span class="text-green-500 font-semibold">Yes</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 h-full">
                                        <div class="flex items-center justify-center space-x-4 h-full">
                                            <a href="{{ route('items.show', $userItem->id) }}"
                                                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 font-semibold">Details</a>
                                            <a href="{{ route('items.edit', $userItem->id) }}"
                                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 font-semibold">Edit</a>
                                            <a href="{{ route('items.show', $userItem->id) }}"
                                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 font-semibold">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
