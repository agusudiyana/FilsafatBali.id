<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect pengguna ke halaman autentikasi Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google setelah pengguna menyetujui login.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // Update google_id jika belum terisi
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->id]);
                }
            } else {
                // Buat user baru otomatis sebagai Pengguna biasa
                $user = User::create([
                    'name'        => $googleUser->name,
                    'email'       => $googleUser->email,
                    'google_id'   => $googleUser->id,
                    'role'        => 'pengguna',
                    'is_verified' => 1,
                    'password'    => Hash::make(Str::random(16)),
                ]);
            }

            // Login-kan user
            Auth::login($user);

            // Redirect ke halaman dashboard/utama
            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {
            \Log::error('Google Auth Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Gagal masuk menggunakan akun Google.');
        }
    }
}