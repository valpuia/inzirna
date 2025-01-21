<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            Live
        </h1>
    </x-slot>

    <section class="container mx-auto py-12 px-6 md:px-0">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
            @forelse ($games as $game)
                <x-games.image :slug="$game->slug" :image="$game->image" :alt="$game->alt" />
            @empty
                <x-empty />
            @endforelse
        </div>

        <div class="mt-10">
            {{ $games->links() }}
        </div>

        <div class="mt-20 text-center text-xl">
            Live casino or Live dealer games can make you experience the thrill of a real-life casino game from the
            comfort of your own home.
        </div>
    </section>
</div>
