<div>
    @includeWhen($seo, 'meta-tags', ['seo' => $seo])

    <x-slot:header>
        <h1 class="text-2xl md:text-4xl font-extrabold leading-none tracking-tight text-white">
            Frequently Asked Questions
        </h1>
    </x-slot>

    <section class="container mx-auto py-12 px-6 md:px-0">
        <div x-data="{ open: 0 }" class="md:w-2/3 md:mx-auto">
            @forelse ($faqs as $faq)
                <div class="border-b">
                    <button @click="open === {{ $faq->id }} ? open = 0 : open = {{ $faq->id }}"
                        class="w-full text-left md:p-4 flex justify-between items-center focus:outline-none">
                        <span class="font-semibold">{{ $faq->question }}</span>
                        <svg x-show="open === {{ $faq->id }}" xmlns="http://www.w3.org/2000/svg"
                            class="size-6 transform rotate-180 transition-transform grow-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <svg x-show="open !== {{ $faq->id }}" xmlns="http://www.w3.org/2000/svg"
                            class="size-6 transition-transform grow-0" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open === {{ $faq->id }}" class="md:p-4 text-gray-600" x-collapse>
                        {{ $faq->answer }}
                    </div>
                </div>
            @empty
                <x-empty />
            @endforelse
        </div>
    </section>
</div>
