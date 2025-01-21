<div class="px-2 text-left md:text-center md:text-gray-400 border-0 md:border-gray-700 rounded-full md:border md:w-auto">
    <x-navigation.link :href="route('home')" :active="request()->routeIs('home')">
        Home
    </x-navigation.link>

    <x-navigation.link :href="route('slot')" :active="request()->routeIs('slot')">
        Slot
    </x-navigation.link>

    <x-navigation.link :href="route('live')" :active="request()->routeIs('live')">
        Live
    </x-navigation.link>

    <x-navigation.link :href="route('fishing')" :active="request()->routeIs('fishing')">
        Fishing
    </x-navigation.link>

    <x-navigation.link :href="route('sport')" :active="request()->routeIs('sport')">
        Sport
    </x-navigation.link>

    <x-navigation.link :href="route('table')" :active="request()->routeIs('table')">
        Table
    </x-navigation.link>

    <x-navigation.link :href="route('arcade')" :active="request()->routeIs('arcade')">
        Arcade
    </x-navigation.link>

    <x-navigation.link :href="route('esport')" :active="request()->routeIs('esport')">
        Esport
    </x-navigation.link>

    <x-navigation.link :href="route('promotion')" :active="request()->routeIs('promotion')">
        Promotion
    </x-navigation.link>

    <x-navigation.link :href="route('blog')" :active="request()->routeIs('blog')">
        Blog
    </x-navigation.link>
</div>
