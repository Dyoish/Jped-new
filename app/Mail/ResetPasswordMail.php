<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function sendResetLink(Request $request)
{
    $email = $request->input('email');
    $token = Str::random(60); // Generate a random token or use any method to create it

    // Optionally save the token in your database along with the email for verification
    // PasswordReset::create(['email' => $email, 'token' => $token]);

    // Send email with the reset link
    Mail::to($email)->send(new ResetPasswordMail($email, $token));

    return redirect()->back()->with('status', 'Password reset link has been sent!');
}
}
