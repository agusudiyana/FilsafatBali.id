<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Aturan validasi dasar untuk kata sandi baru
        $rules = [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];

        // Jika akun BUKAN terhubung dari Google, wajibkan current_password
        if (!$user->google_id) {
            $rules['current_password'] = ['required', 'current_password'];
        }

        // Pesan error Bahasa Indonesia yang jelas dan ramah
        $messages = [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'current_password.current_password' => 'Kata sandi saat ini tidak sesuai.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.min' => 'Kata sandi baru minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ];

        $validated = $request->validateWithBag('updatePassword', $rules, $messages);

        // Update password pengguna dan lepaskan penanda google_id agar selanjutnya diperlakukan sebagai akun ber-password
        $user->update([
            'password'  => Hash::make($validated['password']),
            'google_id' => null,
        ]);

        return back()->with('status', 'password-updated');
    }
}