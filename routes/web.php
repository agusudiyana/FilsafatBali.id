<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AjaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Utama (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Redirect dashboard sesuai role
    Route::get('/dashboard', function () {

        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if (auth()->user()->role == 'penulis') {
            return redirect()->route('penulis.dashboard');
        }

        return redirect()->route('pengguna.dashboard');

    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PENULIS
    |--------------------------------------------------------------------------
    */
    Route::get('/penulis', [PenulisController::class, 'index'])
        ->middleware('role:penulis')
        ->name('penulis.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PENGGUNA
    |--------------------------------------------------------------------------
    */
    Route::get('/pengguna', [PenggunaController::class, 'index'])
        ->middleware('role:pengguna')
        ->name('pengguna.dashboard');

    /*
    |--------------------------------------------------------------------------
    | CRUD AJARAN (ADMIN ONLY)
    |--------------------------------------------------------------------------
    */
    Route::resource('ajaran', AjaranController::class)
        ->middleware('role:admin');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';