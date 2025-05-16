<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class DataPortfolioStep extends Component
{
    public function render()
    {
        return view('livewire.user.data-portfolio-step')->layout('layouts.userMaster');
    }
}
