<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Filsafat;
use App\Models\AjaranTertua;
use App\Models\Cecimpedan;
use App\Models\Satua;
use App\Models\Istilah;
use App\Models\User;
use App\Models\Setting;
use App\Notifications\ArtikelBaruNotification;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Admin
    |--------------------------------------------------------------------------
    */

    public function index(): View
    {
        $totalAjaran   = Artikel::count();
        $pending       = Artikel::where('status', 'pending')->count();
        $disetujui     = Artikel::where('status', 'disetujui')->count();
        $totalPenulis  = User::where('role', 'penulis')->count();
        $totalPengguna = User::count();

        return view('admin.dashboard', compact(
            'totalAjaran',
            'pending',
            'disetujui',
            'totalPenulis',
            'totalPengguna'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN KELOLA STATISTIK BANNER LANDING PAGE
    |--------------------------------------------------------------------------
    */

    public function statistik(): View
    {
        $realAjaran        = AjaranTertua::count() + Artikel::count(); 
        $realCecimpedan    = Cecimpedan::count();
        $realSatua         = Satua::count();
        $realIstilah       = Istilah::count();
        $realKontributor   = User::where('role', 'penulis')->count();
        
        $realTerverifikasi = AjaranTertua::where('status', 'disetujui')->count() +
                             Artikel::where('status', 'disetujui')->count() +
                             Cecimpedan::where('status', 'disetujui')->count() +
                             Filsafat::where('status', 'disetujui')->count() +
                             Satua::where('status', 'disetujui')->count() +
                             Istilah::where('status', 'disetujui')->count();

        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.statistik.index', compact(
            'realAjaran', 
            'realCecimpedan', 
            'realSatua', 
            'realIstilah', 
            'realKontributor', 
            'realTerverifikasi', 
            'settings'
        ));
    }

    public function updateStatistik(Request $request): RedirectResponse
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key], 
                ['value' => $value ?? '0']
            );
        }

        return redirect()->back()->with('success', 'Angka statistik banner berhasil diperbarui!');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI ARTIKEL
    |--------------------------------------------------------------------------
    */

    public function verifikasiAjaran(): View
    {
        $ajaran = Artikel::where('status', 'pending')->latest()->get();

        return view('admin.verifikasi.artikel', compact('ajaran'));
    }

    public function detailAjaran(int $id): View
    {
        $ajaran = Artikel::with('user')->findOrFail($id);

        return view('admin.verifikasi.detail-artikel', compact('ajaran'));
    }

    public function setujuiAjaran(int $id): RedirectResponse
    {
        $ajaran = Artikel::findOrFail($id);
        $ajaran->update(['status' => 'disetujui']);

        // KIRIM NOTIFIKASI KE PENGGUNA
        $penggunas = User::where('role', 'pengguna')->get();
        if ($penggunas->count() > 0) {
            Notification::send($penggunas, new ArtikelBaruNotification($ajaran));
        }

        return redirect()->back()->with('success', 'Artikel berhasil disetujui.');
    }

    public function tolakAjaran(int $id): RedirectResponse
    {
        $ajaran = Artikel::findOrFail($id);
        $ajaran->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Artikel berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI AJARAN TERTUA
    |--------------------------------------------------------------------------
    */

    public function verifikasiAjaranTertua(): View
    {
        $ajaranTertua = AjaranTertua::with('user')
            ->where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.verifikasi.ajaran-tertua', compact('ajaranTertua'));
    }

    public function detailAjaranTertua(int $id): View
    {
        $ajaranTertua = AjaranTertua::with('user')->findOrFail($id);

        return view('admin.verifikasi.detail-ajaran-tertua', compact('ajaranTertua'));
    }

    public function updateStatusAjaranTertua(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak,pending',
        ]);

        $ajaran = AjaranTertua::findOrFail($id);
        $ajaran->update(['status' => $request->status]);

        if ($request->status === 'disetujui') {
            $penggunas = User::where('role', 'pengguna')->get();
            if ($penggunas->count() > 0) {
                Notification::send($penggunas, new ArtikelBaruNotification($ajaran));
            }
        }

        return redirect()->route('admin.verifikasi.ajaran-tertua')
            ->with('success', 'Status ajaran tertua berhasil diperbarui!');
    }

    public function setujuiAjaranTertua(int $id): RedirectResponse
    {
        $ajaran = AjaranTertua::findOrFail($id);
        $ajaran->update(['status' => 'disetujui']);

        // KIRIM NOTIFIKASI KE PENGGUNA
        $penggunas = User::where('role', 'pengguna')->get();
        if ($penggunas->count() > 0) {
            Notification::send($penggunas, new ArtikelBaruNotification($ajaran));
        }

        return redirect()->back()->with('success', 'Ajaran Tertua berhasil disetujui.');
    }

    public function tolakAjaranTertua(int $id): RedirectResponse
    {
        $ajaran = AjaranTertua::findOrFail($id);
        $ajaran->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Ajaran Tertua berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI FILSAFAT
    |--------------------------------------------------------------------------
    */

    public function verifikasiFilsafat(): View
    {
        $filsafats = Filsafat::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.verifikasi.filsafat', compact('filsafats'));
    }

    public function detailFilsafat(int $id): View
    {
        $filsafat = Filsafat::with('user')->findOrFail($id);

        return view('admin.verifikasi.detail-filsafat', compact('filsafat'));
    }

    public function setujuiFilsafat(int $id): RedirectResponse
    {
        $filsafat = Filsafat::findOrFail($id);
        $filsafat->update(['status' => 'disetujui']);

        // KIRIM NOTIFIKASI KE PENGGUNA
        $penggunas = User::where('role', 'pengguna')->get();
        if ($penggunas->count() > 0) {
            Notification::send($penggunas, new ArtikelBaruNotification($filsafat));
        }

        return redirect()->back()->with('success', 'Filsafat berhasil disetujui.');
    }

    public function tolakFilsafat(int $id): RedirectResponse
    {
        $filsafat = Filsafat::findOrFail($id);
        $filsafat->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Filsafat berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI CECIMPEDAN
    |--------------------------------------------------------------------------
    */

    public function verifikasiCecimpedan(): View
    {
        $cecimpedans = Cecimpedan::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.verifikasi.cecimpedan', compact('cecimpedans'));
    }

    public function detailCecimpedan(int $id): View
    {
        $cecimpedan = Cecimpedan::with('user')->findOrFail($id);

        return view('admin.verifikasi.detail-cecimpedan', compact('cecimpedan'));
    }

    public function setujuiCecimpedan(int $id): RedirectResponse
    {
        $cecimpedan = Cecimpedan::findOrFail($id);
        $cecimpedan->update(['status' => 'disetujui']);

        // KIRIM NOTIFIKASI KE PENGGUNA
        $penggunas = User::where('role', 'pengguna')->get();
        if ($penggunas->count() > 0) {
            Notification::send($penggunas, new ArtikelBaruNotification($cecimpedan));
        }

        return redirect()->back()->with('success', 'Cecimpedan berhasil disetujui.');
    }

    public function tolakCecimpedan(int $id): RedirectResponse
    {
        $cecimpedan = Cecimpedan::findOrFail($id);
        $cecimpedan->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Cecimpedan berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI SATUA BALI
    |--------------------------------------------------------------------------
    */

    public function verifikasiSatua(): View
    {
        $satuas = Satua::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.verifikasi.satua', compact('satuas'));
    }

    public function detailSatua(int $id): View
    {
        $satua = Satua::with('user')->findOrFail($id);

        return view('admin.verifikasi.detail-satua', compact('satua'));
    }

    public function setujuiSatua(int $id): RedirectResponse
    {
        $satua = Satua::findOrFail($id);
        $satua->update(['status' => 'disetujui']);

        // KIRIM NOTIFIKASI KE PENGGUNA
        $penggunas = User::where('role', 'pengguna')->get();
        if ($penggunas->count() > 0) {
            Notification::send($penggunas, new ArtikelBaruNotification($satua));
        }

        return redirect()->back()->with('success', 'Satua Bali berhasil disetujui.');
    }

    public function tolakSatua(int $id): RedirectResponse
    {
        $satua = Satua::findOrFail($id);
        $satua->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Satua Bali berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI ISTILAH BALI
    |--------------------------------------------------------------------------
    */

    public function verifikasiIstilah(): View
    {
        $istilahs = Istilah::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.verifikasi.istilah', compact('istilahs'));
    }

    public function detailIstilah(int $id): View
    {
        $istilah = Istilah::with('user')->findOrFail($id);

        return view('admin.verifikasi.detail-istilah', compact('istilah'));
    }

    public function setujuiIstilah(int $id): RedirectResponse
    {
        $istilah = Istilah::findOrFail($id);
        $istilah->update(['status' => 'disetujui']);

        // KIRIM NOTIFIKASI KE PENGGUNA
        $penggunas = User::where('role', 'pengguna')->get();
        if ($penggunas->count() > 0) {
            Notification::send($penggunas, new ArtikelBaruNotification($istilah));
        }

        return redirect()->back()->with('success', 'Istilah Bali berhasil disetujui.');
    }

    public function tolakIstilah(int $id): RedirectResponse
    {
        $istilah = Istilah::findOrFail($id);
        $istilah->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Istilah Bali berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN USER (PENULIS & PENGGUNA)
    |--------------------------------------------------------------------------
    */

    public function kelolaPenulis(): View
    {
        $penulis = User::where('role', 'penulis')->latest()->get();

        return view('admin.manajemen.penulis', compact('penulis'));
    }

    public function kelolaPengguna(): View
    {
        $pengguna = User::where('role', 'pengguna')->latest()->paginate(10);

        return view('admin.manajemen.pengguna', compact('pengguna'));
    }

    /**
     * Menyetujui/memverifikasi akun penulis (is_verified -> 1)
     */
    public function setujuiPenulis(int $id): RedirectResponse
    {
        $author = User::where('role', 'penulis')->findOrFail($id);
        
        $author->update([
            'is_verified' => 1,
        ]);

        return redirect()->back()->with('status', "Akun Penulis '{$author->name}' berhasil disetujui (Aktif)!");
    }

    /**
     * Menolak pendaftaran penulis (is_verified -> 2)
     */
    public function tolakPenulis(int $id): RedirectResponse
    {
        $author = User::where('role', 'penulis')->findOrFail($id);
        
        $author->update([
            'is_verified' => 2,
        ]);

        return redirect()->back()->with('status', "Pendaftaran Penulis '{$author->name}' berhasil ditolak.");
    }
}