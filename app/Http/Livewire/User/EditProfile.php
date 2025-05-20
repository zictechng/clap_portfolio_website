<?php

namespace App\Http\Livewire\User;

use App\Models\Education;
use App\Models\SocialLink;
use App\Models\SystemPreferences;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class EditProfile extends Component
{
    public function render()
    {
        $user = Auth::user();
        $social_links = SocialLink::where('user_uid', $user->id)->first();

        $work_experience = WorkExperience::where('user_uid', $user->id)
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();

        $education = Education::where('user_uid', $user->id)
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();

        $system_links = SystemPreferences::where('user_uid', $user->id)->first();


        return view('livewire.user.edit-profile', ['user_details' => $user, 'social_details' => $social_links , 'work_experience' => $work_experience, 'user_education' => $education, 'preference' =>$system_links])->layout('layouts.userMaster');
    }

    // function to update profile photo

}
