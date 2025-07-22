@extends('layouts.app')

@section('title', 'LuchaLunaLibre - Inicio de Sesión')
@section('content')

<div class="max-w-md mx-auto mt-10">
    <h1 class="text-2xl font-bold text-center dark:text-white">Inicio de Sesión</h1>
    <form action="{{ route('login') }}" method="POST" class="mt-6">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium dark:text-white">Correo Electrónico</label>
            <input type="email" name="email" id="email" required class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:text-white dark:border-gray-600">
            @if ($errors->has('email'))
                <span class="text-red-500">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium dark:text-white">Contraseña</label>
            <input type="password" name="password" id="password" required class="mt-1  p-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:text-white dark:border-gray-600">
            @if ($errors->has('password'))
                <span class="text-red-500">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Iniciar Sesión</button>
    </form>
</div>


@endsection
