<?php
 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return redirect()->route('login');
});
 
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:6,1')->name('login.store');

Route::middleware('auth')->group(function () {
    Route::get('/inicio', function () {
        return redirect()->route('libros.index');
    })->name('inicio');
    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
    Route::resource('libros', LibroController::class)->only(['index']);
});

Route::resource('libros', LibroController::class)
    ->only(['index', 'create', 'store']);

Route::resource('libros', LibroController::class)
    ->only(['index', 'create', 'store', 'edit', 'update']);

