<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            {{ $game->title }}
        </h1>
    </x-slot>

    <section class="container mx-auto py-12 px-6 md:px-0">
        {!! str($game->content)->sanitizeHtml() !!}
    </section>
</div>
