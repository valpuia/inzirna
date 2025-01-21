<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            Fishing
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
            Play Fishing online game, you can play while sitting at the computer, or on your mobile device. Catch as
            many fish as you can before the time runs out or you see a flying fish.
        </div>
    </section>
</div>
