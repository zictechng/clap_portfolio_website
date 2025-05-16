<?php

namespace App\Http\Livewire;

use App\Providers\RouteServiceProvider;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginComponent extends Component
{

    public $email;
    public $password;
    public function login()
    {
        dd($this->email, $this->password);
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login with Auth
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // After successful login, use Livewire's redirect helper
            return redirect(RouteServiceProvider::HOME);
        }

        // If authentication fails, flash an error message
        session()->flash('error', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.user-login-component')->layout("layouts.userMaster");
    }
}
