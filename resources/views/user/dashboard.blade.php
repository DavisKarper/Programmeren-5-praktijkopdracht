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
                                            <button id="deleteItem"
                                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 font-semibold"
                                                itemid="{{ $userItem->id }}">Delete</button>
                                            <script>
                                                const deleteItem = document.getElementById('deleteItem');
                                                const itemDeleteModal = document.getElementById('itemDeleteModal');
                                                const itemDeleteForm = document.getElementById('itemDeleteForm');

                                                deleteItem.addEventListener('click', () => {
                                                    var itemID = $(this).attr('itemid');

                                                    const reader = new FileReader();
                                                    reader.onload = (e) => {
                                                        itemDeleteForm.action =
                                                            {{ route('items.show', ${itemID}) }};
                                                        itemDeleteModal.classList.remove('hidden', 'border-dashed', 'border-2',
                                                            'border-gray-400');
                                                    }
                                                });
                                            </script>
                                        </div>
                                        <div id="itemDeleteModal" class="modal modal-danger fade hidden" tabindex="-1"
                                            role="dialog" aria-labelledby="custom-width-modalLabel">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <form action="" method="POST" class="remove-record-model"
                                                        id="itemDeleteForm">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                            <h5 class="modal-title text-center"
                                                                id="custom-width-modalLabel">Change Department Status
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 id="question">Are You sure want to delete </h4>
                                                            <input type="hidden" name="applicant_id" id="app_id">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
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
