<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

    Route::get('/team', function () {
        return view('company.team');
    })->name('company.team');

    Route::get('/testimonials', function () {
        return view('company.testimonials');
    })->name('company.testimonials');

    Route::get('/faq', function () {
        return view('company.faq');
    })->name('company');
});
require __DIR__ . '/auth.php';
