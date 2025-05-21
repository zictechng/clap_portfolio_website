<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class ProfileComponent extends Component
{
    public $user;
    public $projects;
    public $followers;

    public function mount($user = null)
        {
            if ($user) {
                $userId = Hashids::decode($user);
                if (empty($userId)) {
                    return redirect()->route('home');
                }
                $this->user = User::with(['projects', 'education', 'workExperience'])->findOrFail($userId[0]);
            } else {
                $this->user = User::with(['projects', 'education', 'workExperience'])->findOrFail(Auth::id());
            }

            $this->projects = $this->user->projects()->latest()->get();
        }

    public function render()
    {
        return view('livewire.profile-component', [
            'user_details' => $this->user,
            'projects' => $this->projects,
            'education' => $this->user->education,
            'work_experience' => $this->user->workExperience,
        ])->layout('layouts.master');
    }
}
