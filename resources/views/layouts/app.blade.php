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
    <footer>
        @include('components.footer')
    </footer>
</body>
</html>




