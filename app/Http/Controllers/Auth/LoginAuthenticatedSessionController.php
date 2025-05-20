<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public $email;
    public $password;
    public function store(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        // Check the user's account status
        $user = Auth::user();

        // If account is pending
        if ($user->acct_status == 'pending') {
            Auth::logout(); // Log the user out
            // Redirect to an OTP verification page or custom page
            //return redirect('/otp-verification')->with('message', 'Your account is pending activation. Please verify your OTP.');
            return back()->withErrors([
                'Account Issue' => 'Your account is not yet activated.',
            ]);
        }

        // If account is inactive or blocked
        if ($user->acct_status != 'active') {
            Auth::logout(); // Log the user out
            return redirect('/use-login')->withErrors(['email' => 'Your account is not active or has been blocked.']);
        }

        // Redirect to the intended page or dashboard
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
