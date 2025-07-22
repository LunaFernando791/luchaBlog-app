@extends('layouts.app')

@section('title', 'Mis Posts - LuchaLunaLibre')
@section('content')
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Mis Posts</h1>
        <a href="{{ route('posts.add') }}"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 mb-4">Crear
            Nuevo Post
        </a>
        @if ($posts->isEmpty())
            <p class="text-gray-600 dark:text-gray-300">No tienes posts creados.</p>
        @else
            <ul class="space-y-2 sm:space-y-4">
                @foreach ($posts as $post)
                    <li class="shadow sm:justify-center">
                        <a class="flex sm:flex-row flex-col items-center space-x-2 justify-between" href="{{ route('posts.show', $post->id) }}">
                            <div class="flex sm:flex-row flex-col items-start sm:items-center p-4 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 cursor-pointer">
                                <div class="justify-center mb-2 sm:mb-0 sm:mr-4">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                        class="w-full sm:w-100 sm:h-40 object-cover object-top rounded-lg mb-2 sm:mb-0 sm:mr-4">
                                </div>
                                <div class="flex-grow">
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white ">{{ $post->title }}</h2>
                                    <p class="text-gray-600 dark:text-gray-300">{{ $post->excerpt }}</p>
                                    <p class="text-gray-600 dark:text-gray-300">Publicado el: {{$post->published_at}}</p>
                                </div>
                                <div class="mt-2 flex space-x-2 justify-end flex-grow">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="text-blue-600 dark:text-blue-400 hover:underline"
                                            onclick="event.stopPropagation();">Editar
                                        </a>
                                        <form action="{{route('posts.destroy', $post->id)}}" method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este post?');"
                                            onclick="event.stopPropagation();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 dark:text-red-400 hover:underline">Eliminar</button>
                                        </form>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
                {{ $posts->links() }} <!-- Paginación -->
            </ul>
        @endif
    </div>
@endsection
