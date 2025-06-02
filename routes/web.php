<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👥 RUTAS PROTEGIDAS POR AUTH
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🌐 SECCIÓN COMPANY (incluye about-us y direcciones)
Route::prefix('company')->group(function () {
    // 🔹 Ruta de "Nosotros"
    Route::get('/about-us', function () {
        return view('company.about_us');
    })->name('company.about');

    // 🔹 Rutas de sedes (directions)
    Route::prefix('directions')->group(function () {
        Route::get('/cajamarca', function () {
            return view('company.directions.cajamarca');
        })->name('company.directions.cajamarca');

        Route::get('/chiclayo', function () {
            return view('company.directions.chiclayo');
        })->name('company.directions.chiclayo');

        Route::get('/chimbote', function () {
            return view('company.directions.chimbote');
        })->name('company.directions.chimbote');

        Route::get('/moche', function () {
            return view('company.directions.moche');
        })->name('company.directions.moche');

        Route::get('/pacasmayo', function () {
            return view('company.directions.pacasmayo');
        })->name('company.directions.pacasmayo');

        Route::get('/trujillo', function () {
            return view('company.directions.trujillo');
        })->name('company.directions.trujillo');

        Route::get('/tarapoto', function () {
            return view('company.directions.tarapoto');
        })->name('company.directions.tarapoto');

        Route::get('/piura', function () {
            return view('company.directions.piura');
        })->name('company.directions.piura');

        // (Opcional) Ruta general para todas las sedes
        Route::get('/', function () {
            return view('company.directions.index');
        })->name('company.directions.index');
    });
});

Route::get('/blogs', [PostController::class, 'blog'])->name('blog.index');

// ⚠️ ESTA RUTA DINÁMICA DEBE IR AL FINAL
Route::get('/{id}/{slug}', [PostController::class, 'show'])->name('posts.show');

require __DIR__ . '/auth.php';
