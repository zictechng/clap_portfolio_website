<?php

namespace App\Http\Livewire\User;

use App\Models\Education;
use App\Models\Project;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyPortfolio extends Component
{
    public function render()
    {
        $user = Auth::user();

        $work_experience = WorkExperience::where('user_uid', $user->id)
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();

        $education = Education::where('user_uid', $user->id)
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();

        $perPage = request('perPage', 10); // default to 10 if not specified
        $project = Project::where('user_uid', $user->id)
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);

        return view('livewire.user.my-portfolio', ['user_details' => $user, 'work_experience' => $work_experience, 'user_education' => $education, 'user_project' =>$project])->layout('layouts.userMaster');
    }
}
