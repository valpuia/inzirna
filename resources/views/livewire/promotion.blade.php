<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            Promotion
        </h1>
    </x-slot>

    <section class="container mx-auto py-12 px-6 md:px-0">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse ($promotions as $promotion)
                <div class="border p-0 shadow overflow-hidden rounded-lg">
                    <a href="{{ $promotion->url }}">
                        <img class="object-cover w-full mb-2 max-h-56" src="{{ asset('storage/' . $promotion->image) }}"
                            alt="{{ $promotion->alt }}" loading="lazy">
                    </a>
                    <div class="p-3">
                        <h2 class="font-bold">
                            <a href="{{ $promotion->url }}">{{ $promotion->title }}</a>
                        </h2>
                        <p class="text-sm text-gray-500 mt-2">{{ e($promotion->description) }}</p>
                    </div>

                    <div class="btn-detail w-full bg-gray-600 px-4 py-2">
                        <div class="flex justify-center items-center py-1">
                            <a href="{{ $promotion->url }}" class="text-sm text-white w-1/2 text-center">Details</a>
                            <span class="text-sm font-medium text-green-500 border-l w-1/2 text-center">Auto
                                Applied</span>
                        </div>
                    </div>
                </div>
            @empty
                <x-empty />
            @endforelse
        </div>

        <div class="mt-10">
            {{ $promotions->links() }}
        </div>
    </section>
</div>
