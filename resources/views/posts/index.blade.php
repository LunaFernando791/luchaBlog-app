@extends('layouts.app')

@section('title', 'Categorias - LuchaLunaLibre')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-2xl font-bold text-gray-800 dark:text-white">
    <h1>Posts</h1>
    @if ($posts->isEmpty())
        <p>No hay publicaciones disponibles.</p>
    @else
    @foreach ($posts as $post)
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $post->title }}</h2>
            <p class="text-gray-600 dark:text-gray-400">{{ $post->excerpt }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-300">Autor: {{ $post->author }}</p>
            <a href="#" class="text-blue-600 hover:underline">Leer más</a>
        </div>
    @endforeach
    @endif
    {{ $posts->links() }}
</div>


@endsection
