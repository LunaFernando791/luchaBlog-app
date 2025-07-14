<nav class="bg-white border-b border-gray-200" x-data="{ open: false, dropdownOpen: false }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center space-x-4">
        <img class="h-15 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo">
        <!-- Application Name -->
        <a href="#" class="text-xl font-bold text-blue-600">{{ config('app.name') }}</a>
      </div>

      <!-- Links -->
      <div class="flex space-x-6 items-center hidden sm:flex">
        <a href="#" class="text-gray-700 hover:text-blue-600">Posts</a>

        <!-- Dropdown -->
        <div @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false" class="relative">
          <button class="text-gray-700 hover:text-blue-600">Categorías</button>
          <div x-show="dropdownOpen" class="absolute z-10 bg-white shadow-md mt-2 py-2 w-40">
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Tech</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Sports</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Lifestyle</a>
          </div>
        </div>
      </div>

      <!-- Mobile toggle -->
      <div class="-mr-2 flex sm:hidden">
        <button @click="open = !open" class="p-2">
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

