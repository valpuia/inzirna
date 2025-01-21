<div class="bg-gray-800 text-white">
    <div class="container px-6 md:px-0 py-5 mx-auto space-y-8 overflow-hidden">
        <nav class="flex flex-wrap justify-center -mx-5 -my-2 border-b pb-2 border-gray-400">
            <div class="px-5 py-2">
                <a href="{{ route('announcement') }}" class="text-base leading-6 hover:text-gray-300 underline">
                    Announcement
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="{{ route('faq') }}" class="text-base leading-6 hover:text-gray-300 underline">
                    FAQ
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="{{ route('responsible-gaming') }}" class="text-base leading-6 hover:text-gray-300 underline">
                    Responsible Gaming
                </a>
            </div>
            <div class="px-5 py-2">
                <a href="{{ route('21-gaming') }}" class="text-base leading-6 hover:text-gray-300 underline">
                    21+ Gaming
                </a>
            </div>
        </nav>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-5 gap-4 md:gap-8">
            <div class="md:col-span-3">
                Lucky Cambodia is an VIP online casino that provides all kind of games. With a great security, fast
                cash-out and easy-to-use system, Lucky Cambodia is one of the best place to gamble in town. In Lucky
                Cambodia you have the opportunity to gamble on your favorite games such as poker, roulette, slot
                machines or black jack.You can access the casino to play from any device with an internet connection:
                PC, tablet or Smartphone. There are even some exclusive games that you can't find anywhere else. And
                with Lucky Cambodia Welcome Bonus, you will enjoy for 50 will get bonus 150 extra cash on your first
                deposit. To make sure that all players have the best experience possible, Lucky Cambodia use innovative
                and transparent game software providers who follow the strictest gaming regulations to ensure fairness
                at all times.
            </div>

            <div class="flex flex-col justify-center items-center md:col-span-2">
                <select class="w-[350px] p-3 bg-gray-700 rounded mb-2 border-r-8 border-transparent">
                    <option>English</option>
                </select>
                <img src="/images/support-device.png" alt="supported device" loading="lazy">
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-900">
    <p class="my-2 text-base leading-6 text-center text-white">
        Copyright &copy; {{ date('Y') }} Lucky Cambodia. All rights reserved.
    </p>
</div>
