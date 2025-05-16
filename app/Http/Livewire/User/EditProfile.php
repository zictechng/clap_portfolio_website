<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class EditProfile extends Component
{
    public function render()
    {
        return view('livewire.user.edit-profile')->layout('layouts.userMaster');
    }
}
