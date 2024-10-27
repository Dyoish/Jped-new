<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; // Add this to use Str for generating tokens
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon; // Import Carbon for handling date and time

class PasswordResetController extends Controller
{
    public function sendResetLink(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Check for existing tokens
        $existingToken = DB::table('password_reset_tokens')
            ->where('email', $request->input('email'))
            ->where('created_at', '>=', Carbon::now()->subHours(1)) // Assuming tokens are valid for 1 hour
            ->first();

        // If a valid token exists, notify the user
        if ($existingToken) {
            return redirect()->back()->with('info', 'A password reset link has already been sent. Please check your email.');
        }

        // Generate a reset token
        $token = Str::random(64);

        // Store the new token in the database
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
