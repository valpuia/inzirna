@props(['slug', 'image', 'alt'])

<a href="{{ route('game-details', $slug) }}"
    class="block w-full transition duration-300 ease-in-out transform hover:scale-110 rounded-xl border">
    <img src="{{ asset('storage/' . $image) }}" alt="{{ $alt }}"
        class="rounded-xl h-48 md:h-96 bg-cover object-cover">
</a>
