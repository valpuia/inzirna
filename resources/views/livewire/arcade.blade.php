<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            Arcade
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
            Arcade online is a game of your childhood in your browser. Play the best arcade games online at Lucky
            Cambodia. We have every arcade game you ever imagine.
        </div>
    </section>
</div>
