<x-layout title="Discover free images">
    <div class="container-fluid mt-4">
       
        @include('shared._grid-images',['images' => $images])
    </div>

    {{-- <a href="{{ route('images.create') }}">Upload Image</a> --}}

</x-layout>