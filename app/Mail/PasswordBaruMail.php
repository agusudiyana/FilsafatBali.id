<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordBaruMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $passwordBaru;

    public function __construct($nama, $passwordBaru)
    {
        $this->nama = $nama;
        $this->passwordBaru = $passwordBaru;
    }

    public function build()
    {
        return $this->subject('Kata Sandi Baru Anda - FilsafatBali.Id')
                    ->html("
                        <div style='font-family: Arial, sans-serif; padding: 24px; color: #2B1A0E; background-color: #FAF5ED; border-radius: 12px;'>
                            <h2 style='color: #8D2B1D; margin-bottom: 8px;'>Halo, {$this->nama}!</h2>
                            <p style='font-size: 15px; line-height: 1.6;'>Kami telah memperbarui kata sandi akun Anda atas permintaan reset password pada aplikasi <b>FilsafatBali.Id</b>.</p>
                            <p style='font-size: 15px;'>Berikut adalah kata sandi baru Anda untuk login:</p>
                            
                            <div style='background-color: #8D2B1D; color: #ffffff; padding: 14px 24px; font-size: 22px; font-weight: bold; letter-spacing: 2px; display: inline-block; border-radius: 8px; margin: 16px 0;'>
                                {$this->passwordBaru}
                            </div>
                            
                            <p style='font-size: 14px; color: #8C7A65; margin-top: 20px;'>
                                Silakan gunakan kata sandi ini untuk login kembali. Setelah login, Anda disarankan untuk memperbarui kata sandi ini di pengaturan profil demi keamanan akun.
                            </p>
                        </div>
                    ");
    }
}