<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; // Add this to use Str for generating tokens
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;

class PasswordResetController extends Controller
{
    public function sendResetLink(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Generate a reset token
        $token = Str::random(64);

        // Optionally, store the token in a database table for future validation
        // Assuming you have a `password_reset_tokens` table
        DB::table('password_reset_tokens')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' => now(),
        ]);

        // Send email with reset link
        Mail::to($request->input('email'))->send(new ResetPasswordMail($request->input('email'), $token));

        return redirect()->back()->with('status', 'Password reset link has been sent!');
    }
}
