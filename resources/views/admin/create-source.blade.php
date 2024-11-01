<x-app-layout>
    @auth
        <form action="{{ route('admin.store-source') }}" method="GET" enctype="multipart/form-data"
            class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md space-y-4">
            @csrf
            <div class="space-y-2">
                <x-input-label for="name" class="font-semibold text-gray-700">Name</x-input-label>
                <x-text-input id="name" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-lg p-2"></x-text-input>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">Create</button>
        </form>
    @endauth
</x-app-layout>
