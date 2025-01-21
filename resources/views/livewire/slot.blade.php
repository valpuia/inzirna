<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            Slot
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
            Slot machine games are a wonderful way to kill some time. There is a multitude of different slot machines in
            all sorts of shapes and sizes, and they come in a variety of different themes too.
        </div>
    </section>

</div>
