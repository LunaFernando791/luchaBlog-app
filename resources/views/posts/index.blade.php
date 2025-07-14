@extends('layouts.app')

@section('title', 'Categorias - LuchaLunaLibre')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-2xl font-bold text-gray-800 dark:text-white">
    <h1>Posts</h1>
    @if ($posts->isEmpty())
        <p>No hay publicaciones disponibles.</p>
    @else
    <ul>
        @foreach ($posts as $post )
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
    @endif
</div>
@endsection
