<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAuthorPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $password;

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Password Akun Penulis - FilsafatBali')
                    ->markdown('emails.author_password');
    }
}