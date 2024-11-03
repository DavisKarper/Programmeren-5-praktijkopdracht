<button data-modal-target="delete-popup-modal[{{ $item->id }}]"
    data-modal-toggle="delete-popup-modal[{{ $item->id }}]" type="button"
    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 font-semibold">Delete</button>

<div id="delete-popup-modal[{{ $item->id }}]" tabindex="-1"
    class="fixed inset-0 z-50 hidden flex items-center justify-center w-full h-full">
    <div class="relative p-6 w-full max-w-md bg-white border border-gray-200 rounded-xl shadow-lg">
        <button type="button" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 focus:outline-none"
            data-modal-hide="delete-popup-modal[{{ $item->id }}]">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
        <form action="{{ route($route ?? 'dashboard', $item->id) }}" method="POST" enctype="multipart/form-data"
            class="p-4 md:p-5 text-center">
            @csrf
            @method('DELETE')

            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-5 text-xlg font-normal text-gray-500 dark:text-gray-400">
                Are you sure you want to delete {{ $item->name }}?</h3>
            <button data-modal-hide="delete-popup-modal[{{ $item->id }}]" type="submit"
                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Yes, I'm sure
            </button>
            <button data-modal-hide="delete-popup-modal[{{ $item->id }}]" type="button"
                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                cancel</button>
        </form>
    </div>
</div>
