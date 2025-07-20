@extends('layouts.app')

@section('title', 'Categorias - LuchaLunaLibre')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-2xl font-bold text-gray-800 dark:text-white">
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4 text-center font-medium">
            {{ session('success') }}
        </div>
    @endif
    <h1>Posts</h1>
    @if ($posts->isEmpty())
        <p>No hay publicaciones disponibles.</p>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mt-4">
        @foreach ($posts as $post)
            <div class="w-full mb-4 rounded-lg shadow-md bg-white dark:bg-gray-800">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full rounded-lg h-80 object-cover object-top">
                <div class="mb-4 p-3">
                    <h3 class="text-xl font-semibold">{{ $post->title }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300 text-base">{{ \Illuminate\Support\Str::limit($post->excerpt, 100) }}</p>
                    <a href="{{route('posts.show', $post->id)}}" class="text-blue-600 dark:text-blue-400 hover:underline mt-2 inline-block text-base">Leer más</a>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    {{ $posts->links() }}
</div>
@endsection
