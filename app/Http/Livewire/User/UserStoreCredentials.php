<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserStoreCredentials extends Component
{
    public function render()
    {
        return view('livewire.user.user-store-credentials')->layout('layouts.userMaster');
    }
}
