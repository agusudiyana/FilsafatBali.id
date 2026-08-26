<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\SendAuthorPasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Memanggil tampilan register utama
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

        // 1. Validasi Input dengan Pesan Kustom Bahasa Indonesia
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => $role === 'penulis' ? ['nullable'] : ['required', Rules\Password::defaults()],
            'role'     => ['required', 'in:pengguna,penulis'],
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'name.string'       => 'Nama lengkap harus berupa teks.',
            'name.max'          => 'Nama lengkap maksimal 255 karakter.',
            'email.required'    => 'Alamat email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email ini sudah terdaftar. Silakan gunakan email lain atau masuk ke akun Anda.',
            'password.required' => 'Kata sandi wajib diisi.',
            'role.required'     => 'Peran akun wajib dipilih.',
            'role.in'           => 'Pilihan peran tidak valid.',
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

            return redirect()->route('login')->with(
                'status', 
                'Pendaftaran Penulis berhasil! Password telah dikirimkan ke email Anda. Silakan tunggu verifikasi Admin sebelum dapat login.'
            );
        }

        // 3. ALUR PENDAFTARAN PENGGUNA BIASA (PENGUNJUNG)
        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => 'pengguna',
            'is_verified' => 1, // 1 = Aktif
        ]);

        event(new Registered($user));

        // Otomatis login-kan pengguna baru
        Auth::login($user);

        // Langsung arahkan ke Halaman Utama (Home)
        return redirect()->route('home');
    }
}