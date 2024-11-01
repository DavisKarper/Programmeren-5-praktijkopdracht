<x-app-layout>
    <form class="w-full flex my-6">
        @csrf

        <div class="flex-1 flex gap-4 mx-4">
            <!-- Rarities Filter -->
            <div>
                <button id="RaritiesButton" data-dropdown-toggle="Rarities"
                    class="text-gray-100 bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center"
                    type="button">Rarities
                    <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="Rarities" class="z-10 hidden w-48 bg-gray-800 rounded-lg shadow-lg">
                    <ul class="p-3 space-y-1 text-sm text-gray-300">
                        @foreach ($rarities as $rarity)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-700">
                                    <input id="rarity[{{ $rarity->id }}]" type="checkbox" value="{{ $rarity->id }}"
                                        name="rarities[]"
                                        class="w-4 h-4 text-cyan-500 bg-gray-900 border-gray-600 rounded focus:ring-cyan-500">
                                    <label for="rarity[{{ $rarity->id }}]"
                                        class="ml-2 text-sm font-medium">{{ $rarity->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Types Filter -->
            <div>
                <button id="TypesButton" data-dropdown-toggle="Types"
                    class="text-gray-100 bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center"
                    type="button">Types
                    <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="Types" class="z-10 hidden w-48 bg-gray-800 rounded-lg shadow-lg">
                    <ul class="p-3 space-y-1 text-sm text-gray-300">
                        @foreach ($types as $type)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-700">
                                    <input id="type[{{ $type->id }}]" type="checkbox" value="{{ $type->id }}"
                                        name="types[]"
                                        class="w-4 h-4 text-cyan-500 bg-gray-900 border-gray-600 rounded focus:ring-cyan-500">
                                    <label for="type[{{ $type->id }}]"
                                        class="ml-2 text-sm font-medium">{{ $type->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Sources Filter -->
            <div>
                <button id="SourcesButton" data-dropdown-toggle="Sources"
                    class="text-gray-100 bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center"
                    type="button">Sources
                    <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="Sources" class="z-10 hidden w-48 bg-gray-800 rounded-lg shadow-lg">
                    <ul class="p-3 space-y-1 text-sm text-gray-300">
                        @foreach ($sources as $source)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-700">
                                    <input id="source[{{ $source->id }}]" type="checkbox" value="{{ $source->id }}"
                                        name="sources[]"
                                        class="w-4 h-4 text-cyan-500 bg-gray-900 border-gray-600 rounded focus:ring-cyan-500">
                                    <label for="source[{{ $source->id }}]"
                                        class="ml-2 text-sm font-medium">{{ $source->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sorting and Search -->
        <div class="flex items-center gap-4 w-1/3 mx-4">
            <select name="orderBy" id="orderBy"
                class="text-gray-100 bg-gray-800 border-gray-600 rounded-lg focus:ring-cyan-500 focus:border-cyan-500 p-2">
                <option value="newest" {{ $previousSearch->orderBy === 'newest' ? 'selected' : '' }}>Most recent
                </option>
                <option value="oldest" {{ $previousSearch->orderBy === 'oldest' ? 'selected' : '' }}>Least recent
                </option>
                <option value="aFirst" {{ $previousSearch->orderBy === 'aFirst' ? 'selected' : '' }}>a-z</option>
                <option value="zFirst" {{ $previousSearch->orderBy === 'zFirst' ? 'selected' : '' }}>z-a</option>
            </select>
            <div class="relative flex-1">
                <input type="search" id="search" name="search" value="{{ $previousSearch->search }}"
                    class="w-full p-2 pr-12 text-gray-900 bg-gray-50 rounded-lg focus:ring-cyan-500 focus:border-cyan-500"
                    placeholder="Search" />
                <button type="submit"
                    class="absolute inset-y-0 right-0 flex items-center p-2.5 text-white bg-cyan-700 rounded-r-lg hover:bg-cyan-800">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>


        </div>
    </form>

    <!-- Items Display -->
    <div class="flex flex-wrap mb-4 mx-2 justify-evenly">
        <?php foreach ($items as $item) { ?>
        <div class="max-w-sm mb-4 mx-2 w-60 rounded-lg overflow-hidden shadow-lg bg-gray-50">
            <a href="{{ route('items.show', $item->id) }}">
                <img class="w-60 max-h-60 object-cover"
                    src="@if ($item->image === null) {{ asset('storage/' . $item->type->image) }}
                    @else {{ asset('storage/' . $item->image) }} @endif"
                    alt="{{ $item->name }}">
                <div class="p-4">
                    <h2 class="font-bold mb-2 text-xl tracking-tight" style="color:{{ $item->rarity->color }}">
                        {{ $item->name }}</h2>
                    <div class="text-gray-600">{{ $item->source->name }}</div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>

</x-app-layout>
