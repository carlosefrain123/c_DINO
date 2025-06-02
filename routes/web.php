<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

// 🏠 Página principal con posts
Route::get('/', [PostController::class, 'index'])->name('home');

// 📰 Blog completo (todos los posts)
Route::get('/blogs', [PostController::class, 'blog'])->name('blog.index');

// 📁 Filtrar por categoría
Route::get('/blogs/category/{slug}', [PostController::class, 'blog'])->name('posts.category');

// 🏷️ Filtrar por etiqueta
Route::get('/blogs/tag/{slug}', [PostController::class, 'blog'])->name('posts.tag');

// 🔐 Panel de control
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👥 Rutas de perfil (protegidas por auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🏢 Sección COMPANY
Route::prefix('company')->group(function () {
    // 🔹 Página "Sobre Nosotros"
    Route::get('/about-us', function () {
        return view('company.about_us');
    })->name('company.about');

    // 🔹 Sedes (direcciones)
    Route::prefix('directions')->group(function () {
        Route::get('/', function () {
            return view('company.directions.index');
        })->name('company.directions.index');

        Route::get('/cajamarca', fn() => view('company.directions.cajamarca'))->name('company.directions.cajamarca');
        Route::get('/chiclayo', fn() => view('company.directions.chiclayo'))->name('company.directions.chiclayo');
        Route::get('/chimbote', fn() => view('company.directions.chimbote'))->name('company.directions.chimbote');
        Route::get('/moche', fn() => view('company.directions.moche'))->name('company.directions.moche');
        Route::get('/pacasmayo', fn() => view('company.directions.pacasmayo'))->name('company.directions.pacasmayo');
        Route::get('/trujillo', fn() => view('company.directions.trujillo'))->name('company.directions.trujillo');
        Route::get('/tarapoto', fn() => view('company.directions.tarapoto'))->name('company.directions.tarapoto');
        Route::get('/piura', fn() => view('company.directions.piura'))->name('company.directions.piura');
    });
});

// 📄 Mostrar un post individual (al final para evitar conflictos con otras rutas)
Route::get('/{id}/{slug}', [PostController::class, 'show'])->name('posts.show');

// 🔐 Rutas de autenticación
require __DIR__ . '/auth.php';
