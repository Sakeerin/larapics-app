<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade Components</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    @php
        $icon = "logo.svg";
    @endphp
    {{-- <x-icon :src="$icon" /> --}}
    <x-alert type="success" id="my-alert" class="mt-4" role="flash">
        {{-- <x-slot:title>
            Success
        </x-slot> --}}
        {{-- {{ $component->icon() }} --}}
        <p class="mb-0">Data has been removed. {{ $component->link('Undo') }}</p>
    </x-alert>
    {{-- <x-icon src="logo.svg" /> --}}
    {{-- <x-ui.button /> --}}
    <x-form action="/images" method="POST">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </x-form>
</body>
</html>