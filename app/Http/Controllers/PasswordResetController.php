<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class PasswordResetController extends Controller
{
    public function sendResetLink(Request $request)
    {
        // Logic to generate a reset token or link here
        $email = $request->input('email');

        // Send email with reset link
        Mail::to($email)->send(new ResetPasswordMail($email));

        return redirect()->back()->with('status', 'Password reset link has been sent!');
    }
}