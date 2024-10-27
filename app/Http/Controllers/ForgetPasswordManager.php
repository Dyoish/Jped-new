<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;


class ForgetPasswordManager extends Controller
{
    // Method to show the forget password form
    public function forgetPassword()
    {
        return view("ForgotPassword");
    }

    // Method to handle the forget password form submission
    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
        ]);

        $token = Str::random(64);

        // Insert the token into the database
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // Use the ResetPasswordMail and pass the email first and then the token
        Mail::to($request->email)->send(new ResetPasswordMail($request->email, $token));

        return redirect()->route("forget.password")->with("success", "We have sent an email to reset your password.");
    }

    // Method to show the reset password form with the token
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


    // Method to handle the password reset form submission
    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:6|confirmed",
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where("email", $request->email)
            ->where("token", $request->token)
            ->first();

        if (!$updatePassword) {
            return redirect()->route("reset.password", ['token' => $request->token])->with("error", "Invalid token or email.");
        }

        // Update the user's password
        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);

        // Delete the used token
        DB::table("password_reset_tokens")->where("email", $request->email)->delete();

        return redirect()->route("Login.post")->with("success", "Password reset successful.");
    }
    public function updatePassword(Request $request)
    {
        // Validate the request...
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // Adjust rules as needed
        ]);

        // Find the user by their email or another method (e.g., through the token)
        // Update the user's password
        $user = User::where('email', $request->input('email'))->first(); // Adjust as necessary to get the user

        if ($user) {
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect()->route('Login.post')->with('status', 'Password updated successfully!');
        }

        return redirect()->back()->withErrors(['email' => 'User not found.']);
    }

}
