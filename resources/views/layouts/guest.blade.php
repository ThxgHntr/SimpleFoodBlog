<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kure') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/flowbite@1.5.4/dist/datepicker.js"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="flex flex-col justify-between min-h-screen antialiased">

    @livewire('navigation-menu')

    <div class="flex justify-center text-gray-900 antialiased bg-transparent">
        {{ $slot }}
    </div>

    <footer class="not-prose p-4 bg-white shadow md:px-6 md:py-8 dark:bg-gray-900">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="{{ url('/') }}"
                class="hover:underline">KuRe</a>. All Rights Reserved.
        </span>
    </footer>
    
    @livewireScripts
</body>

</html>
