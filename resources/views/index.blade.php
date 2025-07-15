@extends('layouts.app')

@section('title', 'LuchaLunaLibre - Blog de Lucha Libre')
@section('content')
<div class="flex max-w-7xl mx-auto text-gray-800 dark:text-white">
    <div>
        <h1 class="text-2xl font-bold">Bienvenido a LuchaLunaLibre</h1>
        <p class="mt-4">Tu fuente de noticias, análisis y opiniones sobre la lucha libre.</p>
        <p class="mt-2">Explora nuestros posts y descubre más sobre tus luchadores favoritos.</p>
    </div>
    <div class="ml-8 flex-shrink-0 ">
         <h2>Destacado</h2>
         <div class="mt-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md">
            <!-- Aquí ira la imagen del post destacado -->
             <h2 class="text-xl font-semibold">Título del Post Destacado</h2>
             <p class="mt-2 text-gray-600 dark:text-gray-300">Descripción breve del post destacado. Aquí puedes incluir un resumen o una introducción al contenido del post.</p>
         </div>
    </div>
</div>
<div class="mt-8 max-w-7xl mx-auto text-gray-800 dark:text-white text-center">
        <h2 class="text-xl font-semibold mt-8 justify-center">Empresas</h2>
        <div class="flex mt-4 gap-4">
            <div class="flex w-1/3 bg-gray-100 dark:bg-gray-800 p-2 rounded-lg shadow-md justify-center cursor-pointer hover:bg-gray-200 hover:shadow-lg dark:hover:bg-gray-700 transition-colors">
                <H3>WWE</H3>
            </div>
            <div class="flex w-1/3 bg-gray-100 dark:bg-gray-800 p-2 rounded-lg shadow-md justify-center cursor-pointer hover:bg-gray-200 hover:shadow-lg dark:hover:bg-gray-700 transition-colors">
                <H3>AEW</H3>
            </div>
            <div class="flex w-1/3 bg-gray-100 dark:bg-gray-800 p-2 rounded-lg shadow-md justify-center cursor-pointer hover:bg-gray-200 hover:shadow-lg dark:hover:bg-gray-700 transition-colors">
                <H3>Impact Wrestling</H3>
            </div>
            <div class="flex w-1/3 bg-gray-100 dark:bg-gray-800 p-2 rounded-lg shadow-md justify-center cursor-pointer hover:bg-gray-200 hover:shadow-lg dark:hover:bg-gray-700 transition-colors">
                <H3>NJPW</H3>
            </div>
        </div>
</div>
@endsection