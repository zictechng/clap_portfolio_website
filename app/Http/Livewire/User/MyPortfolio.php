<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class MyPortfolio extends Component
{
    public function render()
    {
        return view('livewire.user.my-portfolio')->layout('layouts.userMaster');
    }
}
