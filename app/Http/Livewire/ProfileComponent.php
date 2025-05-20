<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileComponent extends Component
{
    public function render()
    {
        $user = Auth::user();
        return view('livewire.profile-component', ['user_details' => $user])->layout('layouts.master');
    }
}
