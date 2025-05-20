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
        ]);

        // send the verification email
        $code = $this->generateCode();
        $data = [
            'email' => $request->email,
            'otp_code' => $code,
            'name' => $request->name,
            ];
            Mail::to($request->email)->send(new SignupMail($data));
        // Redirect to the desired route instead of logging the user in
        //return redirect('/user-login'); // Change to your desired route
        return redirect('/activate-account')->with('message', 'Please check your email for the verification code.');
    }

    private function generateCode(): int
        {
            return rand(100000, 999999);
        }
}
