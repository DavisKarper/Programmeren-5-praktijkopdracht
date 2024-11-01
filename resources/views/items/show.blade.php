<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10">
        <!-- Perkament Achtergrond en Rand -->
        <div
            class="relative bg-[url('https://i.imgur.com/uLTTooX.jpg')] bg-cover bg-no-repeat rounded-lg border-8 border-yellow-800 shadow-md p-8">

            <!-- Item Afbeelding (bovenaan, gecentreerd) -->
            @if ($item->image)
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                        class="w-40 h-40 object-cover rounded-lg shadow-md border-2 border-gray-400">
                </div>
            @else
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('storage/' . $item->type->image) }}" alt="{{ $item->name }}"
                        class="w-40 h-40 object-cover rounded-lg shadow-md border-2 border-gray-400">
                </div>
            @endif

            <!-- Item Naam (bovenzijde) -->
            <h1 class="text-4xl font-bold text-center mb-4" style="color: {{ $item->rarity->color }};">
                {{ $item->name }}</h1>

            <!-- Item Informatie -->
            <div class="text-lg text-gray-800">
                <!-- Entries -->
                <p class="mb-4">{{ $item->entries }}</p>

                <!-- Attunement -->
                @if ($item->attunement)
                    <p class="mb-4"><strong>Attunement:</strong> {{ $item->attunement }}</p>
                @endif

                <!-- Weight -->
                @if ($item->weight)
                    <p class="mb-4"><strong>Weight:</strong> {{ $item->weight }} lbs</p>
                @endif

                <!-- Type -->
                <p class="mb-4"><strong>Type:</strong> {{ $item->type->name }}</p>

                <!-- Rarity -->
                <p class="mb-4"><strong>Rarity:</strong> {{ $item->rarity->name }}</p>
            </div>

            <!-- Bron en Gebruiker Informatie Onderin -->
            <div class="mt-6 border-t border-gray-400 pt-4">
                <!-- Source -->
                <p class="text-gray-700 text-sm"><strong>Source:</strong> {{ $item->source->name }}
                    @if ($item->page)
                        - pg. {{ $item->page }}
                    @endif
                </p>

                <!-- Creator -->
                @if ($item->source_id === 1)
                    <p class="text-gray-700 text-sm"><strong>Created by:</strong>
                        @if ($item->user->admin === 1)
                            Moderator
                        @else
                            {{ $item->user->name }}
                        @endif
                    </p>
                @endif

                <!-- Created At & Updated At -->
                <p class="text-gray-600 text-sm"><strong>Created at:</strong>
                    {{ $item->created_at->format('F j, Y, g:i a') }}</p>
                <p class="text-gray-600 text-sm"><strong>Last updated:</strong>
                    {{ $item->updated_at->format('F j, Y, g:i a') }}</p>
            </div>

            <!-- Like Button -->
            <div class="absolute right-4 bottom-4">
                <button class="bg-yellow-400 text-white font-semibold py-2 px-4 rounded shadow hover:bg-yellow-500">
                    Favorite
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
