<?php

namespace App\Http\Livewire\User;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboard extends Component
{
    public function render()
    {
        $user = Auth::user();
        $totalProjects = Project::where('user_uid', $user->id)->count();

        return view('livewire.user.user-dashboard', ['user_details' => $user, 'count_project' =>$totalProjects])->layout('layouts.userMaster');
    }
}
