<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function build()
    {
        return $this->view('emails.reset-password')
            ->subject('Reset Your Password')
            ->with([
                'resetLink' => url('/reset-password?email=' . urlencode($this->email))
            ]);
    }
}