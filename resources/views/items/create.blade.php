<x-app-layout>
    @auth
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
                <textarea rows="10", cols="75" id="entries" name="entries" style="resize:none"></textarea>
                @error('entries')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <x-input-label for="image">Image - not required</x-input-label>
                <input type="file" id="image" name="image">
                @error('image')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <x-input-label for="type">Type</x-input-label>
                <select name="type" id="type">
                    <option value="" selected>Choose the type of item that fits best</option>
                    @foreach ($types as $type)
                        <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                    @endforeach
                </select>
                @error('type')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <x-input-label for="rarity">Rarity</x-input-label>
                <select name="rarity" id="rarity">
                    <option value="" selecetd>Choose the rarity of the item</option>
                    @foreach ($rarities as $rarity)
                        <option value="{{ $rarity['id'] }}">{{ $rarity['name'] }}</option>
                    @endforeach
                </select>
                @error('rarity')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <x-input-label for="reqAttune">Attunement (leave empty if the item doesn't require
                    attunement)</x-input-label>
                <input type="checkbox" id="reqAttune" name="reqAttune">
                <x-text-input type="text" id="attuneDetails" name="attuneDetails"></x-text-input>
                @error('reqAttune')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <x-input-label for="weight">Weight (leave empty if the item doesn't have a weight)</x-input-label>
                <x-text-input id="weight" name="weight"></x-text-input>
                @error('weight')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit">Create</button>
        </form>
    @endauth

</x-app-layout>
