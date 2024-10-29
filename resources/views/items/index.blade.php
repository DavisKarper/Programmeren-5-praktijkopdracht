<x-app-layout>
    <form class="w-full flex my-3">
        @csrf

        <div class="flex-1 w-30 flex gap-4 mx-4">
            <div>
                <button id="RaritiesButton" data-dropdown-toggle="Rarities"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">Rarities <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="Rarities" class="z-10 hidden w-48 bg-white rounded-lg shadow dark:bg-gray-700">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="RaritiesButton">
                        @foreach ($rarities as $rarity)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="rarity[{{ $rarity->id }}]" type="checkbox" value="{{ $rarity->id }}"
                                        name="rarities[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="rarity[{{ $rarity->id }}]"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $rarity->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <button id="TypesButton" data-dropdown-toggle="Types"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">Types <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="Types" class="z-10 hidden w-48 bg-white rounded-lg shadow dark:bg-gray-700">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="TypesButton">
                        @foreach ($types as $type)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="type[{{ $type->id }}]" type="checkbox" value="{{ $type->id }}"
                                        name="types[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="type[{{ $type->id }}]"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $type->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <button id="SourcesButton" data-dropdown-toggle="Sources"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">Sources <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="Sources" class="z-10 hidden w-70 bg-white rounded-lg shadow dark:bg-gray-700">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="SourcesButton">
                        @foreach ($sources as $source)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="source[{{ $source->id }}]" type="checkbox" value="{{ $source->id }}"
                                        name="sources[]"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="source[{{ $source->id }}]"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $source->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>



        <div class="flex flex-1 w-40">
            <select name="orderBy" id="orderBy"
                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                <div id="dropdown"
                    class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        @if ($previousSearch->orderBy === 'oldest')
                            <li>
                                <option value="oldest">Least recent</option>
                            </li>
                        @elseif ($previousSearch->orderBy === 'aFirst')
                            <li>
                                <option value="aFirst">a-z</option>
                            </li>
                        @elseif ($previousSearch->orderBy === 'zFirst')
                            <li>
                                <option value="zFirst">z-a</option>
                            </li>
                        @endif
                        <li>
                            <option value="newest">Most recent</option>
                        </li>
                        <li>
                            <option value="oldest">Least recent</option>
                        </li>
                        <li>
                            <option value="aFirst">a-z</option>
                        </li>
                        <li>
                            <option value="zFirst">z-a</option>
                        </li>
                    </ul>
                </div>
            </select>

            <div class="relative w-full">
                <input type="search" id="search" name="search" value="{{ $previousSearch->search }}"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                    placeholder="Search" />
                <button type="submit"
                    class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
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
