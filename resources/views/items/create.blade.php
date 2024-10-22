<x-app-layout>
    <form action="{{ route('items.store') }}" method="POST">
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
            <label for="entries">Entry</label>
            <input type="text" id="entries" name="entries">
        </div>
        <button type="submit">Create</button>
    </form>
</x-app-layout>
