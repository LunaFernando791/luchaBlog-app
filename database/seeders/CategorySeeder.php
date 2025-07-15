<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([[
            'name' => 'Luchadores',
            'slug' => 'luchadores',
            'description' => 'Categoría dedicada a luchadores profesionales',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Empresas de Lucha',
            'slug' => 'empresas-de-lucha',
            'description' => 'Categoría dedicada a las empresas de lucha libre',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Eventos de Lucha',
            'slug' => 'eventos-de-lucha',
            'description' => 'Categoría dedicada a eventos de lucha libre',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Temas diversos',
            'slug' => 'temas-diversos',
            'description' => 'Categoría para temas diversos relacionados con la lucha libre',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
