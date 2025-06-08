<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

// 🏠 Página principal con posts
Route::get('/', [PostController::class, 'index'])->name('home');

// 📰 Blog completo (todos los posts)
Route::get('/blogs', [PostController::class, 'blog'])->name('blog.index');

// 📃 Blog en vista tipo lista
Route::get('/blogs/list', [PostController::class, 'list'])->name('blog.list');

// 📢 Blog solo de avisos
Route::get('/blogs/notice', [PostController::class, 'notice'])->name('blog.notice');

// 📁 Filtrar por categoría
Route::get('/blogs/category/{slug}', [PostController::class, 'blog'])->name('posts.category');

// 🏷 Filtrar por etiqueta
Route::get('/blogs/tag/{slug}', [PostController::class, 'blog'])->name('posts.tag');

// 🔐 Panel de control (requiere login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👥 Rutas de perfil y CRUD protegidas por auth
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✍ CRUD de Posts (solo usuarios autenticados)
    Route::prefix('posts')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');   // formulario de creación
        Route::post('/', [PostController::class, 'store'])->name('posts.store');          // guardar post
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');    // formulario de edición
        Route::put('/{id}', [PostController::class, 'update'])->name('posts.update');     // actualizar post
        Route::delete('/{id}', [PostController::class, 'destroy'])->name('posts.destroy'); // eliminar post
        // ✅ Nueva ruta para validar el slug vía AJAX
        Route::get('/check-slug', [PostController::class, 'checkSlug'])->name('posts.checkSlug');
    });

    // 👤 Listar posts del usuario autenticado (Dashboard posts)
    Route::get('/posts/mis-posts', [PostController::class, 'userPosts'])->name('posts.userPosts');
});

// 🏢 Sección COMPANY
Route::prefix('company')->group(function () {
    // 🔹 Página "Sobre Nosotros"
    Route::get('/about-us', function () {
        return view('company.about_us');
    })->name('company.about');

    // 🔹 Sedes (direcciones)
    Route::prefix('directions')->group(function () {
        Route::get('/', fn() => view('company.directions.index'))->name('company.directions.index');
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

// 📄 Mostrar un post individual (DEBE IR AL FINAL para evitar conflictos)
Route::get('/{id}/{slug}', [PostController::class, 'show'])->name('posts.show');

// 🔐 Rutas de autenticación
require __DIR__ . '/auth.php';
