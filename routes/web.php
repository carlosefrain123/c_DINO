<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('company')->group(function () {

    Route::get('/about-us', function () {
        return view('company.about_us');
    })->name('company.about');

    // ✅ NUEVAS RUTAS: DIRECCIONES DE SEDES
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

        // (opcional) Ruta general para mostrar todas las sedes
        Route::get('/', function () {
            return view('company.directions.index'); // ← si decides crear una vista general
        })->name('company.directions.index');
    });
});

require __DIR__ . '/auth.php';
