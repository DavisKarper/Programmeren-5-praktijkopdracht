<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div>
            {{-- <label for="name">Name</label>
            <input type="text" id="name" name="name"> --}}
            <x-input-label for="name">Name</x-input-label>
            <x-text-input id="name" name="name"></x-text-input>
        </div>
        <div>
            <label for="entries">Entry</label>
            <input type="text" id="entries" name="entries">
        </div>
        <button type="submit">Create</button>
    </form>
</body>

</html>
