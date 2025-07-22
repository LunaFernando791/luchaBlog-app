@extends('layouts.app')

@section('title', '{{ $post->title }} - LuchaLunaLibre')
@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <article class="bg-white dark:bg-gray-900 shadow-lg rounded-lg overflow-hidden border border-gray-200 dark:border-gray-800">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-100 object-cover object-top">
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">{{ $post->title }}</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">{{ $post->created_at }} •
                    {{ $post->author }}</p>

                <div class="space-y-4 text-gray-800 dark:text-gray-200">
                    {!! $post->content !!}
                </div>

            </div>
        </article>

        <div class="mt-6 text-center">
            <a href="{{ route('posts.index') }}"
                class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                ← Volver al blog
            </a>
        </div>
    </div>
@endsection
