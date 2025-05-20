<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function render()
    {
        return view('livewire.verify-account')->layout("layouts.userMaster");
    }


}
