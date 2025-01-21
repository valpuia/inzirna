@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'relative inline-block w-full h-full px-0 mx-0 md:mx-2 font-medium leading-tight md:text-center text-gray-600 md:text-white py-2 group md:w-auto md:px-2 lg:mx-3 md:text-center'
            : 'relative inline-block w-full h-full px-0 mx-0 md:mx-2 font-medium leading-tight md:text-center duration-300 ease-out py-2 group hover:text-gray-500 md:hover:text-white md:w-auto md:px-2 lg:mx-3 md:text-center';

    $spanClasses =
        $active ?? false
            ? 'absolute bottom-0 left-0 w-full h-px duration-300 ease-out translate-y-px md:bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900'
            : 'absolute bottom-0 w-0 h-px duration-300 ease-out translate-y-px group-hover:left-0 left-1/2 group-hover:w-full md:bg-gradient-to-r md:from-gray-700 md:via-gray-400 md:to-gray-700 from-gray-900 via-gray-600 to-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span>{{ $slot }}</span>
    <span {{ $attributes->merge(['class' => $spanClasses]) }}></span>
</a>
