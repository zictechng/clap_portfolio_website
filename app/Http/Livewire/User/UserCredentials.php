<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserCredentials extends Component
{
    public function render()
    {
        return view('livewire.user.user-credentials')->layout('layouts.userMaster');
    }
}
