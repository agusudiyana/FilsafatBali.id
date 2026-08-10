<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CecimpedanController;
use App\Http\Controllers\IstilahController;
use App\Http\Controllers\FilsafatController;
use App\Http\Controllers\AjaranTertuaController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA & PUBLIC API ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// ROUTE LIVE SEARCH API (DAPAT DIAKSES PUBLIC OLEH SEARCH BAR HERO)
Route::get('/search-live', [HomeController::class, 'searchLive'])->name('search.live');

// ROUTE HALAMAN TENTANG KAMI (PUBLIC)
Route::get('/tentang-kami', function () {
    return view('tentang');
})->name('tentang.kami');

// ROUTE HALAMAN KEBIJAKAN PRIVASI (PUBLIC)
Route::get('/kebijakan-privasi', function () {
    return view('privacy-policy');
})->name('privacy.policy');

// ROUTE HALAMAN SYARAT DAN KETENTUAN (PUBLIC)
Route::get('/syarat-ketentuan', function () {
    return view('syarat-ketentuan');
})->name('syarat.ketentuan');

// ROUTE HALAMAN HUBUNGI KAMI (PUBLIC)
Route::get('/hubungi-kami', function () {
    return view('hubungi-kami');
})->name('hubungi.kami');

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

        // Pengguna biasa diarahkan ke dashboard pengguna (Bukan lagi ke home)
        return redirect()->route('pengguna.dashboard');
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

        // VERIFIKASI ARTIKEL
        Route::get('/verifikasi/artikel', [AdminController::class, 'verifikasiAjaran'])->name('admin.verifikasi.artikel');
        Route::get('/verifikasi/artikel/{id}', [AdminController::class, 'detailAjaran'])->name('admin.verifikasi.artikel.detail');
        
        // Aksi Setujui & Tolak Artikel
        Route::match(['post', 'put'], '/verifikasi/ajaran/{id}/setujui', [AdminController::class, 'setujuiAjaran'])->name('admin.verifikasi.ajaran.setujui');
        Route::match(['post', 'put'], '/verifikasi/ajaran/{id}/tolak', [AdminController::class, 'tolakAjaran'])->name('admin.verifikasi.ajaran.tolak');
        Route::match(['post', 'put'], '/verifikasi/artikel/{id}/setujui', [AdminController::class, 'setujuiAjaran'])->name('admin.verifikasi.artikel.setujui');
        Route::match(['post', 'put'], '/verifikasi/artikel/{id}/tolak', [AdminController::class, 'tolakAjaran'])->name('admin.verifikasi.artikel.tolak');

        // VERIFIKASI AJARAN TERTUA (ADMIN)
        Route::get('/verifikasi/ajaran-tertua', [AdminController::class, 'verifikasiAjaranTertua'])->name('admin.verifikasi.ajaran-tertua');
        Route::get('/verifikasi/detail-ajaran-tertua/{id}', [AdminController::class, 'detailAjaranTertua'])->name('admin.verifikasi.detail-ajaran-tertua');
        Route::match(['post', 'put', 'patch'], '/verifikasi/detail-ajaran-tertua/{id}/status', [AdminController::class, 'updateStatusAjaranTertua'])->name('admin.verifikasi.update-status-ajaran-tertua');

        // VERIFIKASI FILSAFAT
        Route::get('/verifikasi/filsafat', [AdminController::class, 'verifikasiFilsafat'])->name('admin.verifikasi.filsafat');
        Route::get('/verifikasi/filsafat/{id}', [AdminController::class, 'detailFilsafat'])->name('admin.verifikasi.filsafat.detail');
        Route::match(['post', 'put'], '/verifikasi/filsafat/{id}/setujui', [AdminController::class, 'setujuiFilsafat'])->name('admin.verifikasi.filsafat.setujui');
        Route::match(['post', 'put'], '/verifikasi/filsafat/{id}/tolak', [AdminController::class, 'tolakFilsafat'])->name('admin.verifikasi.filsafat.tolak');

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

        // FILSAFAT
        Route::get('/filsafat', [FilsafatController::class, 'index'])->name('penulis.filsafat.index');
        Route::get('/filsafat/create', [FilsafatController::class, 'create'])->name('penulis.filsafat.create');
        Route::post('/filsafat/store', [FilsafatController::class, 'store'])->name('penulis.filsafat.store');
        Route::get('/filsafat/{id}/edit', [FilsafatController::class, 'edit'])->name('penulis.filsafat.edit');
        Route::put('/filsafat/{id}', [FilsafatController::class, 'update'])->name('penulis.filsafat.update');
        Route::delete('/filsafat/{id}', [FilsafatController::class, 'destroy'])->name('penulis.filsafat.destroy');

        // AJARAN TERTUA
        Route::get('/ajaran-tertua', [AjaranTertuaController::class, 'index'])->name('penulis.ajaran-tertua.index');
        Route::get('/ajaran-tertua/create', [AjaranTertuaController::class, 'create'])->name('penulis.ajaran-tertua.create');
        Route::post('/ajaran-tertua/store', [AjaranTertuaController::class, 'store'])->name('penulis.ajaran-tertua.store');
        Route::get('/ajaran-tertua/{id}/edit', [AjaranTertuaController::class, 'edit'])->name('penulis.ajaran-tertua.edit');
        Route::put('/ajaran-tertua/{id}', [AjaranTertuaController::class, 'update'])->name('penulis.ajaran-tertua.update');
        Route::delete('/ajaran-tertua/{id}', [AjaranTertuaController::class, 'destroy'])->name('penulis.ajaran-tertua.destroy');

        // CECIMPEDAN
        Route::get('/cecimpedan', [CecimpedanController::class, 'index'])->name('penulis.cecimpedan.index');
        Route::get('/cecimpedan/create', [CecimpedanController::class, 'create'])->name('penulis.cecimpedan.create');
        Route::post('/cecimpedan/store', [CecimpedanController::class, 'store'])->name('penulis.cecimpedan.store');
        Route::get('/cecimpedan/{id}/edit', [CecimpedanController::class, 'edit'])->name('penulis.cecimpedan.edit');
        Route::put('/cecimpedan/{id}', [CecimpedanController::class, 'update'])->name('penulis.cecimpedan.update');
        Route::delete('/cecimpedan/{id}', [CecimpedanController::class, 'destroy'])->name('penulis.cecimpedan.destroy');

        // SATUA
        Route::get('/satua', [PenulisController::class, 'satuaIndex'])->name('penulis.satua.index');
        Route::get('/satua/create', [PenulisController::class, 'satuaCreate'])->name('penulis.satua.create');
        Route::post('/satua/store', [PenulisController::class, 'satuaStore'])->name('penulis.satua.store');
        Route::get('/satua/{id}/edit', [PenulisController::class, 'satuaEdit'])->name('penulis.satua.edit');
        Route::put('/satua/{id}', [PenulisController::class, 'satuaUpdate'])->name('penulis.satua.update');
        Route::delete('/satua/{id}', [PenulisController::class, 'satuaDestroy'])->name('penulis.satua.destroy');

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
    | PENGGUNA ROUTES (DIUBAH UNTUK MENAMPILKAN DASHBOARD PENGGUNA)
    |--------------------------------------------------------------------------
    */
    Route::prefix('pengguna')->middleware('role:pengguna')->group(function () {

        // Memuat view dashboard pengguna
        Route::get('/dashboard', function () {
            return view('dashboard');
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