<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordBaruMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset request.
     * Generates a random password, updates the user's password,
     * sends it via Email, and redirects to the login page.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input email
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email'    => 'Format alamat email tidak valid.',
            'email.exists'   => 'Alamat email tersebut tidak terdaftar dalam sistem kami.',
        ]);

        // 2. Ambil data user dari database
        $user = User::where('email', $request->email)->first();

        // 3. Buat Password Acak Baru (8 Karakter Kombinasi Huruf & Angka)
        $passwordRandom = Str::random(8);

        // 4. Simpan Password Baru (Terenkripsi) ke Database
        $user->password = Hash::make($passwordRandom);
        $user->save();

        // 5. Kirimkan Password Acak Baru ke Email User
        Mail::to($user->email)->send(new PasswordBaruMail($user->name, $passwordRandom));

        // 6. Redirect langsung ke halaman login dengan pesan sukses
        return redirect()->route('login')
            ->with('status', 'Kata sandi baru telah dikirim ke Gmail Anda. Silakan cek Gmail lalu gunakan kata sandi tersebut untuk login.');
    }
}