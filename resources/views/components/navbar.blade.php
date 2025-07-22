<nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700" x-data="{ open: false, dropdownOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center space-x-4">
                <img class="h-15 w-full" src="{{ asset('images/logoDark.png') }}" alt="Logo">
                <!-- Application Name -->
                <a href="/" class="text-xl font-bold text-blue-600 dark:text-white">{{ config('app.name') }}</a>
            </div>
            <!-- Links -->
            <div class="flex space-x-6 items-center hidden sm:flex ">
                <a href="{{ route('posts.index') }}"
                    class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-white">Blog</a>
                @foreach ($categories as $category)
                    <a href="{{ route('posts.index', $category->id) }}"
                        class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-white">{{ $category->name }}</a>
                @endforeach
                <div class="flex items-center space-x-4 ">
                    @auth
                        <form action="{{ route('logout') }}" method="POST"
                            class="inline flex items-center bg-gray-100 dark:bg-gray-700 rounded-md hover:bg-red-600 hover:text-white transition-colors">
                            @csrf
                            <button type="submit"
                                class="p-2 rounded text-gray-700 dark:text-gray-300 hover:text-blue-600 hover:text-white cursor-pointer">Cerrar
                                Sesión</button>
                        </form>
                    @endauth
                </div>
            </div>
            <!-- Mobile toggle -->
            <div class="flex  sm:hidden ">
                <button @click="open = !open">
                    <svg class="text-gray-500 dark:text-gray-400 h-6 w-6" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" class="sm:hidden">
            <div x-data="{ openCategories: false }" class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('posts.index') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-white">
                    Blog
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('posts.index', ['categoria' => $category->id]) }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-white">
                        {{ $category->name }}
                    </a>

                @endforeach
            </div>
        </div>
    </div>
</nav>
