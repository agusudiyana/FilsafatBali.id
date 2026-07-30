<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CecimpedanController;
use App\Http\Controllers\SatuaController;
use App\Http\Controllers\IstilahController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| HALAMAN DENGAN AUTENTIKASI
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Pengalihan Dashboard Utama Berdasarkan Role
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($role === 'penulis') {
            return redirect()->route('penulis.dashboard');
        }

        return redirect()->route('home');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->middleware('role:admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        // MANAJEMEN USER (Penulis & Pengguna)
        Route::get('/penulis', [AdminController::class, 'kelolaPenulis'])->name('admin.penulis.index');
        Route::get('/pengguna', [AdminController::class, 'kelolaPengguna'])->name('admin.pengguna.index');
        
        // Alias tambahan untuk fleksibilitas panggilan route sidebar
        Route::get('/manajemen/penulis', [AdminController::class, 'kelolaPenulis'])->name('admin.kelola.penulis');
        Route::get('/manajemen/pengguna', [AdminController::class, 'kelolaPengguna'])->name('admin.kelola.pengguna');

        // VERIFIKASI ARTIKEL / AJARAN
        Route::get('/verifikasi/artikel', [AdminController::class, 'verifikasiAjaran'])->name('admin.verifikasi.artikel');
        Route::get('/verifikasi/artikel/{id}', [AdminController::class, 'detailAjaran'])->name('admin.verifikasi.artikel.detail');
        
        // Aksi Setujui & Tolak Artikel (Mendukung alias nama ajaran & artikel)
        Route::match(['post', 'put'], '/verifikasi/ajaran/{id}/setujui', [AdminController::class, 'setujuiAjaran'])->name('admin.verifikasi.ajaran.setujui');
        Route::match(['post', 'put'], '/verifikasi/ajaran/{id}/tolak', [AdminController::class, 'tolakAjaran'])->name('admin.verifikasi.ajaran.tolak');
        Route::match(['post', 'put'], '/verifikasi/artikel/{id}/setujui', [AdminController::class, 'setujuiAjaran'])->name('admin.verifikasi.artikel.setujui');
        Route::match(['post', 'put'], '/verifikasi/artikel/{id}/tolak', [AdminController::class, 'tolakAjaran'])->name('admin.verifikasi.artikel.tolak');

        // VERIFIKASI CECIMPEDAN
        Route::get('/verifikasi/cecimpedan', [AdminController::class, 'verifikasiCecimpedan'])->name('admin.verifikasi.cecimpedan');
        Route::get('/verifikasi/cecimpedan/{id}', [AdminController::class, 'detailCecimpedan'])->name('admin.verifikasi.cecimpedan.detail');
        
        Route::match(['post', 'put'], '/verifikasi/cecimpedan/{id}/setujui', [AdminController::class, 'setujuiCecimpedan'])->name('admin.verifikasi.cecimpedan.setujui');
        Route::match(['post', 'put'], '/verifikasi/cecimpedan/{id}/tolak', [AdminController::class, 'tolakCecimpedan'])->name('admin.verifikasi.cecimpedan.tolak');

        // VERIFIKASI SATUA
        Route::get('/verifikasi/satua', [AdminController::class, 'verifikasiSatua'])->name('admin.verifikasi.satua');
        Route::get('/verifikasi/satua/{id}', [AdminController::class, 'detailSatua'])->name('admin.verifikasi.satua.detail');
        
        Route::match(['post', 'put'], '/verifikasi/satua/{id}/setujui', [AdminController::class, 'setujuiSatua'])->name('admin.verifikasi.satua.setujui');
        Route::match(['post', 'put'], '/verifikasi/satua/{id}/tolak', [AdminController::class, 'tolakSatua'])->name('admin.verifikasi.satua.tolak');

        // VERIFIKASI ISTILAH
        Route::get('/verifikasi/istilah', [AdminController::class, 'verifikasiIstilah'])->name('admin.verifikasi.istilah');
        Route::get('/verifikasi/istilah/{id}', [AdminController::class, 'detailIstilah'])->name('admin.verifikasi.istilah.detail');
        
        Route::match(['post', 'put'], '/verifikasi/istilah/{id}/setujui', [AdminController::class, 'setujuiIstilah'])->name('admin.verifikasi.istilah.setujui');
        Route::match(['post', 'put'], '/verifikasi/istilah/{id}/tolak', [AdminController::class, 'tolakIstilah'])->name('admin.verifikasi.istilah.tolak');
    });

    /*
    |--------------------------------------------------------------------------
    | PENULIS ROUTES
    |--------------------------------------------------------------------------
    */
    Route::prefix('penulis')->middleware('role:penulis')->group(function () {

        Route::get('/', [PenulisController::class, 'index'])->name('penulis.dashboard');

        // ARTIKEL
        Route::get('/artikel', [PenulisController::class, 'artikelIndex'])->name('penulis.artikel.index');
        Route::get('/artikel/create', [PenulisController::class, 'create'])->name('penulis.artikel.create');
        Route::post('/artikel/store', [PenulisController::class, 'store'])->name('penulis.artikel.store');
        Route::get('/artikel/{id}/edit', [PenulisController::class, 'edit'])->name('penulis.artikel.edit');
        Route::put('/artikel/{id}', [PenulisController::class, 'update'])->name('penulis.artikel.update');
        Route::delete('/artikel/{id}', [PenulisController::class, 'destroy'])->name('penulis.artikel.destroy');

        // CECIMPEDAN
        Route::get('/cecimpedan', [CecimpedanController::class, 'index'])->name('penulis.cecimpedan.index');
        Route::get('/cecimpedan/create', [CecimpedanController::class, 'create'])->name('penulis.cecimpedan.create');
        Route::post('/cecimpedan/store', [CecimpedanController::class, 'store'])->name('penulis.cecimpedan.store');
        Route::get('/cecimpedan/{id}/edit', [CecimpedanController::class, 'edit'])->name('penulis.cecimpedan.edit');
        Route::put('/cecimpedan/{id}', [CecimpedanController::class, 'update'])->name('penulis.cecimpedan.update');
        Route::delete('/cecimpedan/{id}', [CecimpedanController::class, 'destroy'])->name('penulis.cecimpedan.destroy');

        // SATUA
        Route::get('/satua', [SatuaController::class, 'index'])->name('penulis.satua.index');
        Route::get('/satua/create', [SatuaController::class, 'create'])->name('penulis.satua.create');
        Route::post('/satua/store', [SatuaController::class, 'store'])->name('penulis.satua.store');
        Route::get('/satua/{id}/edit', [SatuaController::class, 'edit'])->name('penulis.satua.edit');
        Route::put('/satua/{id}', [SatuaController::class, 'update'])->name('penulis.satua.update');
        Route::delete('/satua/{id}', [SatuaController::class, 'destroy'])->name('penulis.satua.destroy');

        // ISTILAH
        Route::get('/istilah', [IstilahController::class, 'index'])->name('penulis.istilah.index');
        Route::get('/istilah/create', [IstilahController::class, 'create'])->name('penulis.istilah.create');
        Route::post('/istilah/store', [IstilahController::class, 'store'])->name('penulis.istilah.store');
        Route::get('/istilah/{id}/edit', [IstilahController::class, 'edit'])->name('penulis.istilah.edit');
        Route::put('/istilah/{id}', [IstilahController::class, 'update'])->name('penulis.istilah.update');
        Route::delete('/istilah/{id}', [IstilahController::class, 'destroy'])->name('penulis.istilah.destroy');

        // RIWAYAT
        Route::get('/riwayat', [PenulisController::class, 'riwayat'])->name('penulis.riwayat');
    });

    /*
    |--------------------------------------------------------------------------
    | PENGGUNA ROUTES
    |--------------------------------------------------------------------------
    */
    Route::prefix('pengguna')->middleware('role:pengguna')->group(function () {

        Route::get('/dashboard', function () {
            return redirect()->route('home');
        })->name('pengguna.dashboard');

        Route::get('/arsip', [PenggunaController::class, 'arsipIndex'])->name('pengguna.arsip.index');
        Route::post('/arsip', [PenggunaController::class, 'storeArsip'])->name('pengguna.arsip.store');
        Route::delete('/arsip/{id}', [PenggunaController::class, 'destroyArsip'])->name('pengguna.arsip.destroy');

        Route::get('/favorit', [PenggunaController::class, 'favoritIndex'])->name('pengguna.favorit.index');
        Route::post('/favorit/toggle/{id}', [PenggunaController::class, 'toggleFavorit'])->name('pengguna.favorit.toggle');

        Route::get('/komunitas', [PenggunaController::class, 'komunitasIndex'])->name('pengguna.komunitas.index');
        Route::post('/komunitas/kirim', [PenggunaController::class, 'storeDiskusi'])->name('pengguna.komunitas.store');

        Route::get('/unduhan', [PenggunaController::class, 'unduhanIndex'])->name('pengguna.unduhan.index');
    });

    /*
    |--------------------------------------------------------------------------
    | PROFILE ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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

require __DIR__ . '/auth.php';