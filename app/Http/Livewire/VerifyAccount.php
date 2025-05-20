<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class VerifyAccount extends Component
{

    public function mount()
    {
        // Check if the user is logged in
        if (auth()->check()) {
            // Redirect to the desired route if the user is already logged in
            return redirect('/user/dashboard');
        }
    }

    public function ActivateAccount()
    {
        // Validate the OTP input
        $this->validate([
            'otp_code' => 'required|digits:6',
        ]);

        // Check if the OTP matches the one sent to the user's email
        $user = User::where('email', session('email'))->first();
        if ($user && $user->otp_code == $this->otp_code) {
            // Update the user's account status to active
            $user->update(
                ['acct_status' => 'active',
                'email_verified_at' => now()]
                );
            return redirect('/user-login')->with('message', 'Your account has been activated successfully! You can now login.');
        } else {
            return back()->withErrors(['otp' => 'The provided OTP is incorrect.']);
        }
    }



    public function render()
    {
        return view('livewire.verify-account')->layout("layouts.userMaster");
    }


}
