<nav class="flex items-center w-full h-16 md:h-24 select-none px-6 md:px-0" x-data="{ showMenu: false }">
    <div class="flex flex-wrap items-center justify-between w-full font-medium">
        <a href="/" class="flex items-center md:w-1/4 py-4 space-x-2 font-extrabold text-white md:py-0">
            <img src="/images/logos/logo-32.png" loading="lazy" width="32" height="32" alt="logo" class="rounded">
            <span>Lucky Cambodia</span>
        </a>

        <div class="hidden md:flex">
            <x-navigation.lists />
        </div>

        <div class="relative z-50 w-auto h-auto md:hidden">
            <template x-teleport="body">
                <div x-show="showMenu" @keydown.window.escape="showMenu=false" class="relative z-[99]">
                    <div x-show="showMenu" x-transition.opacity.duration.600ms @click="showMenu = false"
                        class="fixed inset-0 bg-black bg-opacity-10"></div>
                    <div class="fixed inset-0 overflow-hidden">
                        <div class="absolute inset-0 overflow-hidden">
                            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 bg-black/70">
                                <div x-show="showMenu" @click.away="showMenu = false"
                                    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                    class="w-screen max-w-md">
                                    <div
                                        class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
                                        <div class="px-4 sm:px-5">
                                            <div class="flex items-start justify-between pb-1">
                                                <h2 class="text-base font-semibold leading-6 text-gray-900"
                                                    id="slide-over-title">Lucky Cambodia</h2>
                                                <div class="flex items-center h-auto ml-3">
                                                    <button @click="showMenu=false"
                                                        class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative flex-1 px-4 mt-5 sm:px-5">
                                            <div class="absolute inset-0 px-4 sm:px-5">
                                                <x-navigation.lists />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <div @click="showMenu = !showMenu" class="flex justify-end items-center size-10 cursor-pointer md:hidden"
            :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
            </svg>
        </div>
    </div>
</nav>
