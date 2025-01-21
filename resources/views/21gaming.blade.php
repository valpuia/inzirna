<x-layouts.app>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            {{ $page->title }}
        </h1>
    </x-slot>

    <section class="container mx-auto py-12 px-6 md:px-0">
        {!! str($page->content)->sanitizeHtml() !!}
    </section>
</x-layouts.app>
