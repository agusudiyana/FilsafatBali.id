<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\SendAuthorPasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view or role selection view.
     */
    public function create(Request $request): View
    {
        // Jika URL belum memiliki query parameter 'role', tampilkan halaman pilihan kartu (Role Selection)
        if (!$request->has('role')) {
            return view('auth.select-role');
        }

        // Jika role sudah ada (?role=penulis atau ?role=pengguna), tampilkan form pendaftaran
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $role = $request->input('role', 'pengguna');

        // 1. Validasi Input
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => $role === 'penulis' ? ['nullable'] : ['required', 'confirmed', Rules\Password::defaults()],
            'role'     => ['required', 'in:pengguna,penulis'],
        ]);

        // 2. ALUR PENDAFTARAN PENULIS
        if ($role === 'penulis') {
            $randomPassword = Str::random(8);

            $user = User::create([
                'name'        => $request->name,
                'email'       => $request->email,
                'password'    => Hash::make($randomPassword),
                'role'        => 'penulis',
                'is_verified' => 0, // 0 = Pending
            ]);

            try {
                Mail::to($user->email)->send(new SendAuthorPasswordMail($user->name, $randomPassword));
            } catch (\Throwable $e) {
                \Log::error('Gagal mengirim email password ke Penulis: ' . $e->getMessage());
            }

            // LANGSUNG DILEMPAR KE LOGIN (TANPA AUTH::LOGIN)
            return redirect()->route('login')->with(
                'status', 
                'Pendaftaran Penulis berhasil! Password telah dikirimkan ke email Anda. Silakan tunggu verifikasi Admin sebelum dapat login.'
            );
        }

        // 3. ALUR PENDAFTARAN PENGGUNA BIASA
        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => 'pengguna',
            'is_verified' => 1, // 1 = Aktif
        ]);

        event(new Registered($user));

        // DILEMPAR JUGA KE HALAMAN LOGIN (TIDAK DIBUAT AUTOMATIC LOGIN)
        return redirect()->route('login')->with(
            'status', 
            'Pendaftaran berhasil! Silakan masuk menggunakan akun Anda.'
        );
    }
}