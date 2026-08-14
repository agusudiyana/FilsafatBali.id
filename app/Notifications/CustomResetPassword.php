<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPassword extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($object): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Permintaan Atur Ulang Kata Sandi - FilsafatBali.id')
            ->greeting('Om Swastyastu, ' . $notifiable->name . '!')
            ->line('Kami menerima permintaan untuk mengatur ulang kata sandi akun FilsafatBali.id Anda.')
            ->action('Atur Ulang Kata Sandi', $url)
            ->line('Tautan atur ulang kata sandi ini akan kedaluwarsa dalam waktu 60 menit.')
            ->line('Jika Anda tidak merasa melakukan permintaan ini, abaikan saja email ini.')
            ->salutation('Matur Suksma, Admin FilsafatBali.id');
    }
}