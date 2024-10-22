<x-app-layout>
    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <x-input-label for="name">Name</x-input-label>
            <x-text-input id="name" name="name" value="{{ old('name') }}"></x-text-input>
            @error('name')
                <span>
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div>
            <x-input-label for="entries">Entry</x-input-label>
            <input type="text" id="entries" name="entries">
        </div>
        <div>
            <x-input-label for="image">Image</x-input-label>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <x-input-label for="type">Type</x-input-label>
            <select name="type" id="type">
                @foreach ($types as $type)
                    <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="rarity">Rarity</x-input-label>
            <select name="rarity" id="rarity">
                @foreach ($rarities as $rarity)
                    <option value="{{ $rarity['id'] }}">{{ $rarity['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="reqAttune">Attunement (leave empty if the item doesn't require
                attunement)</x-input-label>
            <input type="text" id="reqAttune" name="reqAttune">
        </div>
        <div>
            <x-input-label for="weight">Weight (leave empty if the item doesn't have a weight)</x-input-label>
            <input type="text" id="weight" name="weight">
        </div>
        <button type="submit">Create</button>
    </form>
</x-app-layout>
