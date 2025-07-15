<nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700" x-data="{ open: false, dropdownOpen: false }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center space-x-4">
        <img class="h-15 w-auto" src="{{ asset('images/logoDark.png') }}" alt="Logo">
        <!-- Application Name -->
        <a href="/" class="text-xl font-bold text-blue-600 dark:text-white">{{ config('app.name') }}</a>
      </div>

      <!-- Links -->
      <div class="flex space-x-6 items-center hidden sm:flex ">
        <a href="{{route('posts.index')}}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-white">Posts</a>

        <!-- Dropdown -->
        <div @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false" class="relative group cursor-pointer">
          <button class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-white">Categorías</button>
          <div x-show="dropdownOpen" class="absolute z-10 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-300 rounded-md shadow-lg w-30">
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Tech</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Sports</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Lifestyle</a>
          </div>
        </div>
      </div>
      <!-- Mobile toggle -->
      <div class="-mr-2 flex sm:hidden ">
        <button onclick="toggleTheme()" class="p-2">
          <svg class="h-6 w-6" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="open" class="sm:hidden">
    <a href="#" class="block px-4 py-2">Posts</a>
    <a href="#" class="block px-4 py-2">Tech</a>
    <a href="#" class="block px-4 py-2">Sports</a>
    <a href="#" class="block px-4 py-2">Lifestyle</a>
  </div>
</nav>
