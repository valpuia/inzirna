<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <title>@yield('title')</title>

    @yield('seo-meta')

    <link rel="apple-touch-icon" sizes="180x180" href="/images/logos/logo-180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/logos/logo-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/logos/logo-16.png">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- {!! $shareScripts !!} --}}

    <style>
        [x-cloak] {
            display: none
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col justify-between">
    <section class="w-full bg-gray-950">
        <div class="mx-auto container">
            <x-navigation />
        </div>
    </section>

    @isset($header)
        <header class="w-full bg-gray-950">
            <div class="container px-6 py-4 md:py-12 mx-auto md:text-center md:px-4">
                {{ $header }}
            </div>
        </header>
    @endisset

    <section class="flex-grow">
        {{ $slot }}
    </section>

    <x-footer />
</body>

</html>
