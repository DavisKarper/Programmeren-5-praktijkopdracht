<x-app-layout>
    @auth
        <a href="{{ route('items.create') }}">Create new item</a>
    @endauth
    <h1>Items:</h1>
    <div class="flex flex-wrap mb-4 mx-2 justify-evenly">
        <?php foreach ($items as $item) { ?>
        <div class="max-w-sm mb-4 mx-2 w-60 rounded overflow-hidden shadow-lg">
            <a href="{{ route('items.show', $item->id) }}">
                <img class="w-60 max-h-60"
                    src="@if ($item->image === null) {{ asset('storage/' . $item->type->image) }}
                    @else {{ asset('storage/' . $item->image) }} @endif"
                    alt="{{ $item->name }}">
                <h2 class="font-bold text-xl mb-2" style="color:{{ $item->rarity->color }}">{{ $item->name }}</h2>
                <div>{{ $item->source->name }}</div>
            </a>
        </div>
        <?php } ?>
    </div>
</x-app-layout>
