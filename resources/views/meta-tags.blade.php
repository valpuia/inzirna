@props(['seo'])

@section('title', $seo['title'] ?? 'Lucky Cambodia')

@section('seo-meta')
    <meta name="title" content="{{ $seo['title'] }}">
    <meta name="description" content="{{ $seo['description'] }}">
    <meta name="keywords" content="{{ $seo['keywords'] }}">
    <meta name="author" content="{{ $seo['author'] ?? 'Lucky Cambodia' }}">

    <meta property="og:title" content="{{ $seo['title'] }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image"
        content="{{ $seo['image'] ? asset('storage/' . $seo['image']) : url('/') . '/images/logos/logo-250.png' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ $seo['description'] }}" />
    <meta property="og:site_name" content="Lucky Cambodia" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="Lucky Cambodia" />
    <meta name="twitter:title" content="{{ $seo['title'] }}" />
    <meta name="twitter:description" content="{{ $seo['description'] }}" />
    <meta name="twitter:image"
        content={{ $seo['image'] ? asset('storage/' . $seo['image']) : url('/') . '/images/logos/logo-250.png' }} />
@endsection
