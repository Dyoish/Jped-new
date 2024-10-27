<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $token;

    public function __construct($email, $token) 
    {
        $this->email = $email;
        $this->token = $token; 
    }

    public function build()
    {
        return $this->view('emails.reset-password')
            ->subject('Reset Your Password')
            ->with([
                'resetLink' => url('/reset-password/' . urlencode($this->token) . '?email=' . urlencode($this->email))
            ]);
    }
}
