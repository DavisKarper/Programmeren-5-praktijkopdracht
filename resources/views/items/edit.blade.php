<x-app-layout>
    @auth
        <form action="{{ route('items.update', $item->id) }}" method="PUT" enctype="multipart/form-data"
            class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md space-y-4">
            @csrf
            <div class="space-y-2">
                <x-input-label for="name" class="font-semibold text-gray-700">Name</x-input-label>
                <x-text-input id="name" name="name" value="{{ old('name', $item->name) }}"
                    class="w-full border border-gray-300 rounded-lg p-2"></x-text-input>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <x-input-label for="entries" class="font-semibold text-gray-700">Entry</x-input-label>
                <textarea rows="10" cols="75" id="entries" name="entries"
                    class="w-full border border-gray-300 rounded-lg p-2 resize-none">{{ old('entries', $item->entries) }}</textarea>
                @error('entries')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <x-input-label for="type" class="font-semibold text-gray-700">Type</x-input-label>
                <select name="type" id="type" class="w-full border border-gray-300 rounded-lg p-2">
                    <option value="{{ old('type', $item->type->id) }}" selected>
                        {{ old('type', $item->type->name, 'Choose the type of item that fits best') }}</option>
                    @foreach ($types as $type)
                        <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                    @endforeach
                </select>
                @error('type')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <x-input-label for="rarity" class="font-semibold text-gray-700">Rarity</x-input-label>
                <select name="rarity" id="rarity" class="w-full border border-gray-300 rounded-lg p-2">
                    <option value="{{ old('rarity', $item->rarity->id) }}" selected>
                        {{ old('rarity', $item->rarity->name, 'Choose the rarity of the item') }}</option>
                    @foreach ($rarities as $rarity)
                        <option value="{{ $rarity['id'] }}">{{ $rarity['name'] }}</option>
                    @endforeach
                </select>
                @error('rarity')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            @if (Auth::user()->admin == 1)
                <div class="space-y-2">
                    <x-input-label for="source" class="font-semibold text-gray-700">Source</x-input-label>
                    <select name="source" id="source" class="w-full border border-gray-300 rounded-lg p-2">
                        <option value="{{ old('source', $item->source->id) }}" selected>
                            {{ old('item', $item->source->name, 'Choose the source this item comes from') }}</option>
                        @foreach ($sources as $source)
                            <option value="{{ $source['id'] }}">{{ $source['name'] }}</option>
                        @endforeach
                    </select>
                    @error('source')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            <div class="space-y-2">
                <x-input-label for="image" class="font-semibold text-gray-700">Image</x-input-label>
                <img class="w-60 max-h-60"
                    src="@if ($item->image === null) {{ asset('storage/' . $item->type->image) }}
                    @else {{ asset('storage/' . $item->image) }} @endif"
                    alt="{{ $item->name }}">
                <div class="flex items-center space-x-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="changeImage" name="changeImage" value="1" class="sr-only peer"
                            onclick="toggleImage()">
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer dark:bg-gray-700 peer-checked:bg-blue-600 transition duration-300">
                        </div>
                        <span class="ml-3 text-gray-700 font-medium">Change current image</span>
                    </label>
                </div>
                <div id="imageContainer" class="mt-2 hidden">
                    <x-image-input class="w-full"></x-image-input>
                </div>
                <script>
                    function toggleImage() {
                        const checkbox = document.getElementById('changeImage');
                        const attuneDetailsContainer = document.getElementById('imageContainer');
                        attuneDetailsContainer.classList.toggle('hidden', !checkbox.checked);
                    }
                </script>
            </div>

            <div class="space-y-2">
                <x-input-label for="reqAttune" class="font-semibold text-gray-700">Attunement</x-input-label>
                <div class="flex items-center space-x-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="reqAttune" name="reqAttune" value="requires attunement"
                            class="sr-only peer" onclick="toggleAttunement()"
                            @if ($item->reqAttune !== null) checked @endif>
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer dark:bg-gray-700 peer-checked:bg-blue-600 transition duration-300">
                        </div>
                        <span class="ml-3 text-gray-700 font-medium">Requires Attunement</span>
                    </label>
                </div>
                <div id="attuneDetailsContainer" class="mt-2 @if ($item->reqAttune === null) hidden @endif>">
                    <x-text-input type="text" id="attuneDetails" name="attuneDetails" placeholder="by a wizard..."
                        value="{{ old('attuneDetails', str_replace('requires attunement ', '', $item->reqAttune)) }}"
                        class="w-full border border-gray-300 rounded-lg p-2 transition duration-300 ease-in-out"></x-text-input>
                </div>
                @error('reqAttune')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <script>
                    function toggleAttunement() {
                        const checkbox = document.getElementById('reqAttune');
                        const attuneDetailsContainer = document.getElementById('attuneDetailsContainer');
                        attuneDetailsContainer.classList.toggle('hidden', !checkbox.checked);
                    }
                </script>
            </div>

            <div class="space-y-2">
                <x-input-label for="weight" class="font-semibold text-gray-700">Weight in lbs (leave empty if the item
                    doesn't have a weight)</x-input-label>
                <x-text-input id="weight" name="weight" value="{{ old('weight', $item->weight) }}"
                    class="w-full border border-gray-300 rounded-lg p-2"></x-text-input>
                @error('weight')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">Create</button>
        </form>
    @endauth
</x-app-layout>
