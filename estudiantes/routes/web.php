<?php
 
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LoginController;
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
        return redirect()->route('estudiantes.index');
    })->name('inicio');
    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
    Route::resource('estudiantes', EstudianteController::class)
        ->only(['index']);
});
