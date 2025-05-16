<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AuthProfileComponent extends Component
{
    public function render()
    {
        return view('livewire.auth-profile-component')->layout('layouts.master');
    }
}
