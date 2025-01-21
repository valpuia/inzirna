@props(['slug', 'image', 'title', 'date', 'excerpt', 'alt'])

<a href="{{ $slug }}" class="border rounded-lg shadow">
    <img class="object-cover w-full overflow-hidden rounded-t-lg mb-1 h-56" src="{{ $image }}"
        alt="{{ $alt }}" height="230" loading="lazy">

    <div class="px-3 mb-3">
        <span class="text-xs">{{ $date }}</span>
        <h2 class="text-lg font-bold mt-2">{{ $title }}</h2>
        <p class="text-sm text-gray-500">{{ $excerpt }}</p>
    </div>
</a>
