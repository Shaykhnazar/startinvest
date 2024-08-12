<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="relative min-h-full">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Startuplarni keyingi bosqichga olib chiqishda ko'maklashuvchi plarforma.">

        <meta property="og:url" content="https://startinvest.uz/">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Startinvest.uz - bu startuplarni rivojlantirish, investitsiya jalb qilish uchun online platforma!">
        <meta property="og:title" content="">
        <meta property="og:description" content="Startinvest.uz - bu startuplarni rivojlantirish, investitsiya jalb qilish uchun online platforma!">
{{--        <meta property="og:image" content="https://startinvest.uz/images/og-image.png">--}}

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
