<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //TODO: Acá va a consumir los factories
        // Crear 5 usuarios
        \App\Models\User::factory()->create(['name' => 'Admin User', 'email' => 'admin@example.com', 'role' => 'admin']);
        \App\Models\User::factory(4)->create();
        // Crear 5 Categorias
        \App\Models\Category::factory(5)->create();
        // Crear 5 tags
        \App\Models\Tag::factory(5)->create();
        // Crear 50 posts
        \App\Models\Post::factory(50)->create();
    }
}
