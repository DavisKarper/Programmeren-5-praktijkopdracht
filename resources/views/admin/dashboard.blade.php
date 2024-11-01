<x-app-layout>
    @auth
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-start">
                        <!-- Changed items-center to items-start -->
                        <div class="flex items-start"> <!-- New wrapper to align button properly -->
                            <button id="toggleTable"
                                class="flex items-center text-gray-600 hover:text-gray-900 text-2xl font-bold dark:text-white mr-4">
                                <!-- Added margin-right -->
                                <span id="toggleIcon" class="mr-2">▼</span>
                                <span>Your items:</span>
                            </button>
                        </div>
                        <div class="flex gap-4">
                            <a href="{{ route('admin.create-source') }}"
                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Create new source
                            </a>
                            <a href="{{ route('items.create') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Create new item
                            </a>
                        </div>
                    </div>

                    <div id="itemsTable" class="overflow-x-auto" style="display: block;">
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
                                                <x-delete-popup-modal :item="$userItem" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <x-delete-popup-modal-script />
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('toggleTable').addEventListener('click', function() {
                const table = document.getElementById('itemsTable');
                const icon = document.getElementById('toggleIcon');
                if (table.style.display === 'none' || table.style.display === '') {
                    table.style.display = 'block';
                    icon.textContent = '▼'; // Change to down arrow
                } else {
                    table.style.display = 'none';
                    icon.textContent = '▲'; // Change to up arrow
                }
            });
        </script>
    @endauth
</x-app-layout>
