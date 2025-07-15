
@extends('layouts.app')

@section('title', 'LuchaLunaLibre - Edición')

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('posts.store')}}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 dark:text-gray-300">Título</label>
            <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
        </div>
        <div class="mb-4  ">
            <label for="content" class="block text-gray-700 dark:text-gray-300">Contenido</label>
            <textarea id="editor" name="content" class="hidden"></textarea>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700 dark:text-gray-300">Categoría</label>
            <select id="category" name="category_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors">Crear Post</button>
    </form>
</div>
@endsection

