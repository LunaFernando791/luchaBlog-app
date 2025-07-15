<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LuchaLunaLibre</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
<body class="min-h-screen flex flex-col">
    <header>
        @include('components.navbar')
    </header>
    <main class="flex-grow bg-gray-100 py-8 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    </main>
    @auth
    <div x-data="{open:false}">
        <button @click="open = !open" class="fixed z-10  bottom-4 right-4 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-800 cursor-pointer transition-colors">
            +
        </button>
        <a href="{{route('posts.add')}}" x-show="open" class="fixed z-10 bottom-16 right-4 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-800 cursor-pointer transition-colors">
            Crear Post
        </a>
    </div>
    @endauth
    <footer>
        @include('components.footer')
    </footer>
</body>
</html>





