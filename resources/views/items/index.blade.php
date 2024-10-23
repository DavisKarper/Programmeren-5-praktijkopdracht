<x-app-layout>
    @auth
        <a href="{{ route('items.create') }}">Create new item</a>
    @endauth


    <form class="max-w-md mx-auto">
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="search" name="search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search" value="{{ old('search') }}" />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>


    <div class="flex flex-wrap mb-4 mx-2 justify-evenly">
        <?php foreach ($items as $item) { ?>
        <div class="max-w-sm mb-4 mx-2 w-60 rounded overflow-hidden shadow-lg">
            <a href="{{ route('items.show', $item->id) }}">
                <img class="w-60 max-h-60"
                    src="@if ($item->image === null) {{ asset('storage/' . $item->type->image) }}
                    @else {{ asset('storage/' . $item->image) }} @endif"
                    alt="{{ $item->name }}">
                <div class="p-3">
                    <h2 class="font-bold mb-2 text-2xl  tracking-tight" style="color:{{ $item->rarity->color }}">
                        {{ $item->name }}</h2>
                    <div>{{ $item->source->name }}</div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</x-app-layout>
