<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CecimpedanController;
use App\Http\Controllers\SatuaController;
use App\Http\Controllers\IstilahController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

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

    Route::middleware('role:admin')->prefix('admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.dashboard');

        /*
        |--------------------------------------------------------------------------
        | AJARAN
        |--------------------------------------------------------------------------
        */

        Route::get('/verifikasi/ajaran', [AdminController::class, 'verifikasiAjaran'])
            ->name('admin.verifikasi.ajaran');

        Route::get('/verifikasi/ajaran/{id}', [AdminController::class, 'detailAjaran'])
            ->name('admin.verifikasi.ajaran.detail');

        Route::put('/verifikasi/ajaran/{id}/setujui', [AdminController::class, 'setujuiAjaran'])
            ->name('admin.verifikasi.ajaran.setujui');

        Route::put('/verifikasi/ajaran/{id}/tolak', [AdminController::class, 'tolakAjaran'])
            ->name('admin.verifikasi.ajaran.tolak');

        /*
        |--------------------------------------------------------------------------
        | CECIMPEDAN
        |--------------------------------------------------------------------------
        */

        Route::get('/verifikasi/cecimpedan', [AdminController::class, 'verifikasiCecimpedan'])
            ->name('admin.verifikasi.cecimpedan');

        Route::get('/verifikasi/cecimpedan/{id}', [AdminController::class, 'detailCecimpedan'])
            ->name('admin.verifikasi.cecimpedan.detail');

        Route::put('/verifikasi/cecimpedan/{id}/setujui', [AdminController::class, 'setujuiCecimpedan'])
            ->name('admin.verifikasi.cecimpedan.setujui');

        Route::put('/verifikasi/cecimpedan/{id}/tolak', [AdminController::class, 'tolakCecimpedan'])
            ->name('admin.verifikasi.cecimpedan.tolak');

        /*
        |--------------------------------------------------------------------------
        | SATUA
        |--------------------------------------------------------------------------
        */

        Route::get('/verifikasi/satua', [AdminController::class, 'verifikasiSatua'])
            ->name('admin.verifikasi.satua');

        Route::get('/verifikasi/satua/{id}', [AdminController::class, 'detailSatua'])
            ->name('admin.verifikasi.satua.detail');

        Route::put('/verifikasi/satua/{id}/setujui', [AdminController::class, 'setujuiSatua'])
            ->name('admin.verifikasi.satua.setujui');

        Route::put('/verifikasi/satua/{id}/tolak', [AdminController::class, 'tolakSatua'])
            ->name('admin.verifikasi.satua.tolak');

        /*
        |--------------------------------------------------------------------------
        | ISTILAH
        |--------------------------------------------------------------------------
        */

        Route::get('/verifikasi/istilah', [AdminController::class, 'verifikasiIstilah'])
            ->name('admin.verifikasi.istilah');

        Route::get('/verifikasi/istilah/{id}', [AdminController::class, 'detailIstilah'])
            ->name('admin.verifikasi.istilah.detail');

        Route::put('/verifikasi/istilah/{id}/setujui', [AdminController::class, 'setujuiIstilah'])
            ->name('admin.verifikasi.istilah.setujui');

        Route::put('/verifikasi/istilah/{id}/tolak', [AdminController::class, 'tolakIstilah'])
            ->name('admin.verifikasi.istilah.tolak');
    });

    /*
    |--------------------------------------------------------------------------
    | PENULIS
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:penulis')->prefix('penulis')->group(function () {

        Route::get('/', [PenulisController::class, 'index'])
            ->name('penulis.dashboard');

        // AJARAN
        Route::get('/ajaran', [PenulisController::class, 'ajaranIndex'])
            ->name('penulis.ajaran.index');

        Route::get('/ajaran/create', [PenulisController::class, 'createAjaran'])
            ->name('penulis.ajaran.create');

        Route::post('/ajaran/store', [PenulisController::class, 'storeAjaran'])
            ->name('penulis.ajaran.store');

        // CECIMPEDAN
        Route::get('/cecimpedan', [CecimpedanController::class, 'index'])
            ->name('penulis.cecimpedan.index');

        Route::get('/cecimpedan/create', [CecimpedanController::class, 'create'])
            ->name('penulis.cecimpedan.create');

        Route::post('/cecimpedan/store', [CecimpedanController::class, 'store'])
            ->name('penulis.cecimpedan.store');

        // SATUA
        Route::get('/satua', [SatuaController::class, 'index'])
            ->name('penulis.satua.index');

        Route::get('/satua/create', [SatuaController::class, 'create'])
            ->name('penulis.satua.create');

        Route::post('/satua/store', [SatuaController::class, 'store'])
            ->name('penulis.satua.store');

        // ISTILAH
        Route::get('/istilah', [IstilahController::class, 'index'])
            ->name('penulis.istilah.index');

        Route::get('/istilah/create', [IstilahController::class, 'create'])
            ->name('penulis.istilah.create');

        Route::post('/istilah/store', [IstilahController::class, 'store'])
            ->name('penulis.istilah.store');

        // RIWAYAT
        Route::get('/riwayat', [PenulisController::class, 'riwayat'])
            ->name('penulis.riwayat');
    });

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
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', function () {

        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');

    })->name('logout');
});

require __DIR__.'/auth.php';