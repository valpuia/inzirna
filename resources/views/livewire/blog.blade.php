<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            Blog
        </h1>
    </x-slot>

    <section class="container mx-auto py-12 px-6 md:px-0">
        <div class="flex justify-end mb-3">
            <input type="search" wire:model.live.debounce.300ms='search'
                class="rounded-md border border-gray-700 focus:outline-none focus:border-orange-500 px-3 py-1 md:w-[300px] w-full"
                placeholder="Search...">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
            @forelse ($blogs as $blog)
                <x-blog-card :slug="route('blog-details', $blog->slug)" :title="$blog->title" :image="asset('storage/' . $blog->image)" :date="$blog->created_at->format('F dS, Y')" :excerpt="$blog->excerpt"
                    :alt="$blog->alt" />
            @empty
                <x-empty />
            @endforelse
        </div>

        <div class="mt-10">
            {{ $blogs->links() }}
        </div>
    </section>
</div>
