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
        <div x-data="{ open: false }">
            <button @click="open = !open"
                id="menu"
                class="fixed z-10  bottom-4 right-4 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg
                hover:bg-blue-800 cursor-pointer transition-transform duration-500">
                +
            </button>
            <div x-show="open"
                x-transition:enter="transition ease-out duration-600"
                x-transition:enter-start="opacity-0 transform scale-10 translate-y-2"
                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100 translate-y-2"
                x-transition:leave-end="opacity-0 transform scale-10 translate-y-2"
                class="fixed bottom-1 right-4 z-10">
                <a href="{{ route('posts.add') }}"
                    class="fixed bg-blue-600 bottom-16 right-4 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-800 cursor-pointer transition-colors">
                    Crear Post
                </a>
            </div>
            <div x-show="open"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 transform scale-10 translate-y-2"
                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100 translate-y-2"
                x-transition:leave-end="opacity-0 transform scale-10 translate-y-2"
                class="fixed bottom-3 right-4 z-10">
                <a href="{{ route('posts.my_posts') }}" x-show="open"
                    class="fixed z-10 bottom-28 right-4 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-800 cursor-pointer transition-colors">
                    Mis Posts
                </a>
            </div>
            @if(auth()->user()->isAdmin())
                <div x-show="open"
                    x-transition:enter="transition ease-out duration-400"
                    x-transition:enter-start="opacity-0 transform scale-10 translate-y-2"
                    x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100 translate-y-2"
                    x-transition:leave-end="opacity-0 transform scale-10 translate-y-2"
                    class="fixed bottom-5 right-4 z-10">
                    <a href="{{ route('users.index') }}" x-show="open"
                        class="fixed z-10 bottom-40 right-4 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-800 cursor-pointer transition-colors">
                        Usuarios
                    </a>
                </div>
                <div x-show="open"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-10 translate-y-2"
                    x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100 translate-y-2"
                    x-transition:leave-end="opacity-0 transform scale-10 translate-y-2"
                    class="fixed bottom-7 right-4 z-10">
                    <a href="{{ route('users.create') }}" x-show="open"
                        class="fixed z-10 bottom-52 right-4 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-800 cursor-pointer transition-colors">
                        Crear Usuario
                    </a>
                </div>
            @endif
        </div>
    @endauth
    <footer>
        @include('components.footer')
    </footer>
</body>

</html>

<script>
    document.querySelector('#menu').addEventListener('click', function(event) {
        menu.style.transform = 'rotate(360deg)';
        setTimeout(() => {
           menu.style.transform = 'rotate(0deg)';
           menu.textContent = '+';
        }, 300);
        event.stopPropagation();
    });
</script>
