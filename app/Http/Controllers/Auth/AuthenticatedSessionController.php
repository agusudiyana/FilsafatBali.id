<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Otorisasi Login & Tangkap Error Kredensial Salah
        try {
            $request->authenticate();
        } catch (ValidationException $e) {
            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi yang Anda masukkan tidak sesuai.',
            ]);
        }

        // 2. CEK STATUS VERIFIKASI PENULIS
        $user = Auth::user();

        if ($user->role === 'penulis' && !$user->is_verified) {
            // Logout pengguna jika belum diverifikasi oleh admin
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Lempar error ke form login
            throw ValidationException::withMessages([
                'email' => 'Akun Penulis Anda belum diverifikasi oleh Admin. Silakan tunggu persetujuan sebelum login.',
            ]);
        }

        $request->session()->regenerate();

        // 3. Pengalihan Sesuai Role
        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        if ($user->role === 'penulis') {
            return redirect()->intended(route('penulis.dashboard', absolute: false));
        }

        // Pengguna Biasa langsung diarahkan ke Halaman Utama (Home)
        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}