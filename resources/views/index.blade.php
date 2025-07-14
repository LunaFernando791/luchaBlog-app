<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<body>
    <header>
        @include('components.navbar')
    </header>
    <div class="container max-w-7xl mx-auto px-4 py-8">
        <h1>Welcome to {{ config('app.name') }}</h1>
        <p>This is a simple welcome page.</p>
        <p>Current Date and Time: {{ date('Y-m-d H:i:s') }}</p>
    </div>
    </body>
    <footer>
        @include('components.footer')
    </footer>
</html>
