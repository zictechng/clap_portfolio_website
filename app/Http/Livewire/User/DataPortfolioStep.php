<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DataPortfolioStep extends Component
{
    public function render()
    {
        $user = Auth::user();
        return view('livewire.user.data-portfolio-step', ['user_details' => $user])->layout('layouts.userMaster');
    }
}
