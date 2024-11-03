<x-app-layout>
    @auth
        <x-slot name="header" class="flex items-center direction-column">
            <div class="flex space-x-8 sm:-my-px sm:ms-10">
                <x-nav-link :href="route('dashboard', ['section' => 'items'])" :active="request()->query('section') === 'items'">
                    {{ __('Items dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('dashboard', ['section' => 'sources'])" :active="request()->query('section') === 'sources'">
                    {{ __('Sources dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('dashboard', ['section' => 'users'])" :active="request()->query('section') === 'users'">
                    {{ __('Users dashboard') }}
                </x-nav-link>
            </div>
        </x-slot>

        <div class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-start">
                        <div class="flex items-start">
                            <h2 id="toggleTable"
                                class="flex items-center text-gray-600 hover:text-gray-900 text-2xl font-bold dark:text-white mr-4">
                                <span>Sources:</span>
                            </h2>
                        </div>
                        <div class="flex gap-4">
                            <a href="{{ route('admin.create-source') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Create new source
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto" style="display: block;">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr class="border-b dark:border-gray-700">
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Id</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Name</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Created At</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Updated At</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sources as $source)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-2">{{ $source->id }}</td>
                                        <td class="px-4 py-2">{{ $source->name }}</td>
                                        <td class="px-4 py-2">{{ $source->created_at }}</td>
                                        <td class="px-4 py-2">{{ $source->updated_at }}</td>
                                        <td class="px-4 py-2 h-full">
                                            <div class="flex items-center justify-center space-x-4 h-full">
                                                <x-delete-popup-modal :item="$source" route="admin.destroy-source" />
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
    @endauth
</x-app-layout>
