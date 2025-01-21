@props(['carouselImages'])

<div x-data="{
    activeImage: 0,
    interval: null,
    startAutoplay() {
        this.interval = setInterval(() => {
            this.activeImage = (this.activeImage + 1) % {{ count($carouselImages) }};
        }, 5000);
    },
}" x-init="startAutoplay()" class="relative w-full">
    <div class="relative overflow-hidden">
        @foreach ($carouselImages as $index => $carousel)
            <a href="{{ $carousel->links }}" x-show="activeImage === {{ $index }}"
                class="transition duration-700 ease-in-out">
                <img src="{{ asset('storage/' . $carousel->image) }}" class="w-full h-52 md:h-80 object-cover rounded"
                    alt="{{ $carousel->alt }}" />
            </a>
        @endforeach
    </div>

    <div class="flex justify-center mt-4 space-x-2 absolute bottom-5 w-full">
        @foreach ($carouselImages as $key => $image)
            <div :class="{
                'bg-orange-500': activeImage === {{ $key }},
                'bg-gray-500': activeImage !== {{ $key }}
            }"
                class="size-2 rounded-full"></div>
        @endforeach
    </div>
</div>
