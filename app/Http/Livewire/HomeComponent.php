<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $user = Auth::user();
        return view('livewire.home-component', ['user_details' => $user])->layout('layouts.master');
    }

}
