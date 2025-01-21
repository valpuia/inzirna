<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-4xl font-extrabold leading-10 tracking-tight text-white sm:text-5xl md:text-6xl xl:text-7xl">
            <span class="block">Lucky Cambodia Casino: Best Online Casino for Slots, Sports & Table Games</span>
        </h1>
    </x-slot>

    <section class="container mx-auto py-12 px-6 md:px-0">
        <x-carousel :carouselImages="$carouselImages" />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <x-home-images :path="route('slot')" :imagePath="asset('images/home/slot.webp')" :name="'Slots'" :buttonName="'Play now'" />
            <x-home-images :path="route('arcade')" :imagePath="asset('images/home/arcade.webp')" :name="'arcade'" :buttonName="'Play now'" />
            <x-home-images :path="route('fishing')" :imagePath="asset('images/home/fishing.webp')" :name="'fishing'" :buttonName="'Play now'" />
            <x-home-images :path="route('live')" :imagePath="asset('images/home/live.webp')" :name="'live'" :buttonName="'Play now'" />
            <x-home-images :path="route('sport')" :imagePath="asset('images/home/sport.webp')" :name="'sport'" :buttonName="'Play now'" />
            <x-home-images :path="route('table')" :imagePath="asset('images/home/table.webp')" :name="'table'" :buttonName="'Play now'" />
        </div>

        <div class="mt-12 pb-2 flex justify-between items-center">
            <div class="text-2xl font-semibold">Latest Blogs</div>
            <a href="{{ route('blog') }}" class="flex gap-x-3">
                View all
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:gap-8">
            @foreach ($blogs as $blog)
                <x-blog-card :slug="route('blog-details', $blog->slug)" :title="$blog->title" :image="asset('storage/' . $blog->image)" :date="$blog->created_at->format('F dS, Y')"
                    :excerpt="$blog->excerpt" :alt="$blog->alt" />
            @endforeach
        </div>
    </section>
</div>
