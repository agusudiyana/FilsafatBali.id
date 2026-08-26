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
    | Dashboard Admin (Statistik Dinamis Real-Time)
    |--------------------------------------------------------------------------
    */

    public function index(): View
    {
        // 1. Total Semua Konten Ajaran dari 5 Modul Utama
        $totalAjaran = Filsafat::count() 
            + AjaranTertua::count() 
            + Cecimpedan::count() 
            + Satua::count() 
            + Istilah::count();

        // 2. Perlu Verifikasi (Status Pending dari 5 Modul)
        $pending = Filsafat::where('status', 'pending')->count()
            + AjaranTertua::where('status', 'pending')->count()
            + Cecimpedan::where('status', 'pending')->count()
            + Satua::where('status', 'pending')->count()
            + Istilah::where('status', 'pending')->count();

        // 3. Total Disetujui (Status Disetujui dari 5 Modul)
        $disetujui = Filsafat::where('status', 'disetujui')->count()
            + AjaranTertua::where('status', 'disetujui')->count()
            + Cecimpedan::where('status', 'disetujui')->count()
            + Satua::where('status', 'disetujui')->count()
            + Istilah::where('status', 'disetujui')->count();

        // 4. Total Penulis
        $totalPenulis = User::where('role', 'penulis')->count();

        // 5. Total Pengguna Terdaftar
        $totalPengguna = User::where('role', 'pengguna')->count();

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
    | DAFTAR TERPADU: TOTAL AJARAN, PENDING & DISETUJUI
    |--------------------------------------------------------------------------
    */

    // 1. Menampilkan Semua Ajaran (Kartu 1)
    public function semuaAjaran(): View
    {
        $artikels     = Artikel::with('user')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Artikel'));
        $filsafats    = Filsafat::with('user')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Filsafat'));
        $ajaranTertua = AjaranTertua::with('user')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Ajaran Tertua'));
        $cecimpedans  = Cecimpedan::with('user')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Cecimpedan'));
        $satuas       = Satua::with('user')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Satua Bali'));
        $istilahs     = Istilah::with('user')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Istilah Bali'));

        $semuaAjaran = $artikels->concat($filsafats)
            ->concat($ajaranTertua)
            ->concat($cecimpedans)
            ->concat($satuas)
            ->concat($istilahs)
            ->sortByDesc('updated_at');

        return view('admin.verifikasi.semua-ajaran', compact('semuaAjaran'));
    }

    // 2. Menampilkan Semua Konten Pending (Kartu 2)
    public function semuaPending(): View
    {
        $artikels     = Artikel::with('user')->where('status', 'pending')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Artikel'));
        $filsafats    = Filsafat::with('user')->where('status', 'pending')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Filsafat'));
        $ajaranTertua = AjaranTertua::with('user')->where('status', 'pending')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Ajaran Tertua'));
        $cecimpedans  = Cecimpedan::with('user')->where('status', 'pending')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Cecimpedan'));
        $satuas       = Satua::with('user')->where('status', 'pending')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Satua Bali'));
        $istilahs     = Istilah::with('user')->where('status', 'pending')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Istilah Bali'));

        $semuaPending = $artikels->concat($filsafats)
            ->concat($ajaranTertua)
            ->concat($cecimpedans)
            ->concat($satuas)
            ->concat($istilahs)
            ->sortByDesc('updated_at');

        return view('admin.verifikasi.semua-pending', compact('semuaPending'));
    }

    // 3. Menampilkan Semua Konten Disetujui (Kartu 3)
    public function semuaDisetujui(): View
    {
        $artikels     = Artikel::with('user')->where('status', 'disetujui')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Artikel'));
        $filsafats    = Filsafat::with('user')->where('status', 'disetujui')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Filsafat'));
        $ajaranTertua = AjaranTertua::with('user')->where('status', 'disetujui')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Ajaran Tertua'));
        $cecimpedans  = Cecimpedan::with('user')->where('status', 'disetujui')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Cecimpedan'));
        $satuas       = Satua::with('user')->where('status', 'disetujui')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Satua Bali'));
        $istilahs     = Istilah::with('user')->where('status', 'disetujui')->get()->map(fn($item) => $item->setAttribute('kategori_modul', 'Istilah Bali'));

        $semuaDisetujui = $artikels->concat($filsafats)
            ->concat($ajaranTertua)
            ->concat($cecimpedans)
            ->concat($satuas)
            ->concat($istilahs)
            ->sortByDesc('updated_at');

        return view('admin.verifikasi.disetujui', compact('semuaDisetujui'));
    }

    // 4. Hapus Konten Terpublikasi Secara Langsung
    public function hapusKontenDisetujui(string $type, int $id): RedirectResponse
    {
        switch ($type) {
            case 'Artikel':
                $konten = Artikel::findOrFail($id);
                break;
            case 'Filsafat':
                $konten = Filsafat::findOrFail($id);
                break;
            case 'Ajaran Tertua':
                $konten = AjaranTertua::findOrFail($id);
                break;
            case 'Cecimpedan':
                $konten = Cecimpedan::findOrFail($id);
                break;
            case 'Satua Bali':
                $konten = Satua::findOrFail($id);
                break;
            case 'Istilah Bali':
                $konten = Istilah::findOrFail($id);
                break;
            default:
                return redirect()->back()->with('error', 'Kategori konten tidak ditemukan.');
        }

        $konten->delete();

        return redirect()->back()->with('success', "Konten {$type} berhasil dihapus dari platform!");
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI ARTIKEL
    |--------------------------------------------------------------------------
    */

    public function verifikasiAjaran(Request $request): View
    {
        $status = $request->query('status', 'pending');
        $query = Artikel::query();

        if ($status !== 'semua') {
            $query->where('status', $status);
        }

        $ajaran = $query->latest()->get();

        return view('admin.verifikasi.artikel', compact('ajaran', 'status'));
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

    public function verifikasiAjaranTertua(Request $request): View
    {
        $status = $request->query('status', 'pending');
        $query = AjaranTertua::with('user');

        if ($status !== 'semua') {
            $query->where('status', $status);
        }

        $ajaranTertua = $query->latest()->paginate(10);

        return view('admin.verifikasi.ajaran-tertua', compact('ajaranTertua', 'status'));
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

    public function verifikasiFilsafat(Request $request): View
    {
        $status = $request->query('status', 'pending');
        $query = Filsafat::query();

        if ($status !== 'semua') {
            $query->where('status', $status);
        }

        $filsafats = $query->latest()->paginate(10);

        return view('admin.verifikasi.filsafat', compact('filsafats', 'status'));
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

    public function verifikasiCecimpedan(Request $request): View
    {
        $status = $request->query('status', 'pending');
        $query = Cecimpedan::query();

        if ($status !== 'semua') {
            $query->where('status', $status);
        }

        $cecimpedans = $query->latest()->paginate(10);

        return view('admin.verifikasi.cecimpedan', compact('cecimpedans', 'status'));
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

    public function verifikasiSatua(Request $request): View
    {
        $status = $request->query('status', 'pending');
        $query = Satua::query();

        if ($status !== 'semua') {
            $query->where('status', $status);
        }

        $satuas = $query->latest()->paginate(10);

        return view('admin.verifikasi.satua', compact('satuas', 'status'));
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

    public function verifikasiIstilah(Request $request): View
    {
        $status = $request->query('status', 'pending');
        $query = Istilah::query();

        if ($status !== 'semua') {
            $query->where('status', $status);
        }

        $istilahs = $query->latest()->paginate(10);

        return view('admin.verifikasi.istilah', compact('istilahs', 'status'));
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

    public function setujuiPenulis(int $id): RedirectResponse
    {
        $author = User::where('role', 'penulis')->findOrFail($id);
        
        $author->update([
            'is_verified' => 1,
        ]);

        return redirect()->back()->with('status', "Akun Penulis '{$author->name}' berhasil disetujui (Aktif)!");
    }

    public function tolakPenulis(int $id): RedirectResponse
    {
        $author = User::where('role', 'penulis')->findOrFail($id);
        
        $author->update([
            'is_verified' => 2,
        ]);

        return redirect()->back()->with('status', "Pendaftaran Penulis '{$author->name}' berhasil ditolak.");
    }
}