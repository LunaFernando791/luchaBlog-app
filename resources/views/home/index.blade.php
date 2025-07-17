@extends('layouts.app')

@section('title', 'LuchaLunaLibre - Blog de Lucha Libre')
@section('content')
<div class="flex gap-3 sm:flex-row flex-col max-w-7xl mx-auto text-gray-800 dark:text-white">
    <div class="flex-1 basis-1/3 sm:w-2/3 text-center p-4">
        <h1 class="text-2xl font-bold">Bienvenido a LuchaLunaLibre</h1>
        <p class="mt-4">Tu fuente de noticias, análisis y opiniones sobre la lucha libre.</p>
        <p class="mt-2">Explora nuestros posts y descubre más sobre tus luchadores favoritos.</p>
    </div>
    <div class="flex-shrink-0 basis-3/4 sm:w-1/3">
         <h2>Destacado</h2>
         <div class="flex sm:flex-row flex-col mt-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md">
            <!-- Aquí ira la imagen del post destacado -->
            <img src="{{asset('storage/' . $postDestacado->featured_image)}}" alt="{{ $postDestacado->title }}"
            class=" w-full h-70 sm:w-70 object-cover rounded-lg mb-4 sm:mb-0 sm:mr-4">
            <div class="mt-4">
                <h2 class="text-xl font-semibold">{{ $postDestacado->title }}</h2>
                <span class="text-gray-500 dark:text-gray-400 text-sm">{{ $postDestacado->created_at }}</span>
                <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $postDestacado->excerpt }}</p>
                <a href="{{route('posts.show', $postDestacado->id)}}" class="text-blue-600 dark:text-blue-400 hover:underline mt-2 inline-block">Leer más</a>
            </div>
         </div>
    </div>
</div>
<div class="mt-8 max-w-7xl mx-auto text-gray-800 dark:text-white text-center">
        <h2 class="text-xl font-semibold mt-8 justify-center">Empresas</h2>
        <div class="flex mt-4 gap-4 ">
            <div class="flex w-1/3 h-25 bg-gray-100 dark:bg-gray-800 p-2 rounded-lg shadow-md justify-center items-center cursor-pointer hover:bg-gray-200 hover:shadow-lg dark:hover:bg-gray-700 transition-colors">
                <img src="{{asset('images/logowwe.png')}}" alt="logo wwe" class="h-12 w-auto">
            </div>
            <div class="flex w-1/3 h-25 bg-gray-100 dark:bg-gray-800 p-2 rounded-lg shadow-md justify-center items-center cursor-pointer hover:bg-gray-200 hover:shadow-lg dark:hover:bg-gray-700 transition-colors">
                <img src="{{asset('images/logoaew.png')}}" alt="logo aew" class="h-12 w-auto">
            </div>
            <div class="flex w-1/3 h-25 bg-gray-100 dark:bg-gray-800 p-2 rounded-lg shadow-md justify-center items-center cursor-pointer hover:bg-gray-200 hover:shadow-lg dark:hover:bg-gray-700 transition-colors">
                <img src="{{asset('images/logonjpw.png')}}" alt="logo njpw" class="h-12 w-auto">
            </div>
            <div class="flex w-1/3 h-25 bg-gray-100 dark:bg-gray-800 p-2 rounded-lg shadow-md justify-center items-center cursor-pointer hover:bg-gray-200 hover:shadow-lg dark:hover:bg-gray-700 transition-colors">
                <img src="{{asset('images/logoaaa.png')}}" alt="logo aaa" class="h-12 w-auto">
            </div>
        </div>
</div>
<div class="max-w-7xl mx-auto mt-8 text-gray-800 dark:text-white">
    <h2 class="text-xl font-semibold mt-8 ">Últimos Posts</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mt-4">
        @foreach ($posts as $post)
            <div class="w-full mb-4 rounded-lg shadow-md bg-white dark:bg-gray-800">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full rounded-lg h-80 object-cover object-top">
                <div class="mb-4 p-3">
                    <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ \Illuminate\Support\Str::limit($post->excerpt, 100) }}</p>
                    <a href="{{route('posts.show', $post->id)}}" class="text-blue-600 dark:text-blue-400 hover:underline mt-2 inline-block">Leer más</a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
</div>
@endsection
