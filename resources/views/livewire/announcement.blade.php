<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            Announcements
        </h1>
    </x-slot>

    <section class="container mx-auto py-12 px-6 md:px-0 md:w-2/3">
        @forelse ($announcements as $announcement)
            <div class="border p-5 rounded mb-5 shadow">
                <div class="border-b w-full font-semibold">
                    {{ $announcement->title }}
                </div>

                <div class="mt-3">
                    {{ $announcement->detail }}
                </div>
            </div>
        @empty
            <x-empty />
        @endforelse

        <div class="mt-5">
            {{ $announcements->links() }}
        </div>
    </section>
</div>
