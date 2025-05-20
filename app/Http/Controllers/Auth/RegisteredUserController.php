<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SignupMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Handle the incoming registration request.
     */

    public function store(Request $request)
    {

        $code = $this->generateCode();

        $request->validate([
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_otp' => $code,
            'acct_status' => 'pending',
        ]);

        // send the verification email

        $data = [
            'email' => $request->email,
            'otp_code' => $code,
            'name' => $request->name,
            ];
        Mail::to($request->email)->send(new SignupMail($data));
        // Redirect to the desired route instead of logging the user in
        session(['user_email' => $request->email]);
        //return redirect('/user-login'); // Change to your desired route
        return redirect('/activate-account')->with('message', 'Please check your email for a verification code.');
    }

    private function generateCode(): int
        {
            return rand(100000, 999999);
        }


// verify/activate user account with the OTP code
    public function ActivateAccount(Request $request)
    {
        // Validate the OTP input
        $request->validate([
            'otp_code' => 'required|numeric|digits:6',
        ]);

        // Check if the OTP matches the one sent to the user's email
        $user = User::where('email', $request->otp_email)->first();
        if (!$user) {
            return back()->withErrors(['otp' => 'Details not found.']);
        }
        if ($user && $user->user_otp == $request->otp_code) {
            // Update the user's account status to active
            $user->update(
                ['acct_status' => 'active',
                'email_verified_at' => now()]
                );
            return redirect('/user-login')->with('message', 'Your account is now activated! You can now login.');
        } else {
            return back()->withErrors(['otp' => 'The provided OTP Code is incorrect.']);
        }
    }

    // resend the OTP code to the user's email
    public function resendOtp(Request $request)
    {
        // Validate the email input
        $request->validate([
            'otp_resend_email' => 'required|string|email|max:255',
        ]);

        // Check if the user exists
        $user = User::where('email', $request->otp_resend_email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Details not found.']);
        }

        // Generate a new OTP code
        $code = $this->generateCode();

        // Update the user's OTP code in the database
        $user->update(['user_otp' => $code]);

        // Send the verification email with the new OTP code
        $data = [
            'email' => $user->email,
            'otp_code' => $code,
            'name' => $user->name,
            ];
        Mail::to($user->email)->send(new SignupMail($data));

        return back()->with('message', 'A new verification code has been sent to your email.');
    }
}
