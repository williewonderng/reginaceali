<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
            <div class="relative w-full sm:max-w-md flex flex-col items-center">
                <div class="w-full px-6 pt-16 pb-8 bg-white shadow-md overflow-visible sm:rounded-lg relative flex flex-col items-center z-10">
                    <a href="/" wire:navigate class="z-20">
                        <img src="{{ asset('images/mary.jpeg') }}" alt="Mary Logo" class="w-40 h-40 rounded-full shadow-lg border-4 border-emerald-100 bg-white object-cover ring-4 ring-white absolute left-1/2 -top-20 -translate-x-1/2 z-20">
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
