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
    // public function render()
    // {
    //     $user = Auth::user();
    //     if (!$user) {
    //         abort(403, 'Unauthorized'); // or redirect to login
    //     }
    //     $social_links = SocialLink::where('user_uid', $user->id)->first();

    //     $work_experience = WorkExperience::where('user_uid', $user->id)
    //     ->orderBy('created_at', 'desc')
    //     ->limit(10)
    //     ->get();

    //     $education = Education::where('user_uid', $user->id)
    //     ->orderBy('created_at', 'desc')
    //     ->limit(10)
    //     ->get();

    //     $system_links = SystemPreferences::where('user_uid', $user->id)->first();


    //     return view('livewire.user.edit-profile', ['user_details' => $user, 'social_details' => $social_links , 'work_experience' => $work_experience, 'user_education' => $education, 'preference' =>$system_links])->layout('layouts.userMaster');
    // }


    public function render()
        {
            $user = Auth::user();

            if (!$user) {
                abort(403, 'Unauthorized'); // or redirect to login
            }

            // Check each query result and fallback to null or empty collection
            $social_links = SocialLink::where('user_uid', $user->id)->first();
            if (!$social_links) {
                $social_links = null;  // explicitly null if no record found
            }

            $work_experience = WorkExperience::where('user_uid', $user->id)
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
            if ($work_experience->isEmpty()) {
                $work_experience = collect(); // empty collection to avoid errors in view loops
            }

            $education = Education::where('user_uid', $user->id)
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
            if ($education->isEmpty()) {
                $education = collect();
            }

            $system_links = SystemPreferences::where('user_uid', $user->id)->first();
            if (!$system_links) {
                $system_links = null;
            }

            return view('livewire.user.edit-profile', [
                'user_details'    => $user,
                'social_details'  => $social_links,
                'work_experience' => $work_experience,
                'user_education'  => $education,
                'preference'      => $system_links,
            ])->layout('layouts.userMaster');
        }

    // function to update profile photo

}
