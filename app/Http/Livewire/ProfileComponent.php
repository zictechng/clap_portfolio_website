<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;
use Livewire\WithPagination;

class ProfileComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $user;
    //public $projects;
    public $followers;

    public function mount($user = null)
        {
            if ($user) {
                $userId = Hashids::decode($user);
                if (empty($userId)) {
                    return redirect()->route('home');
                }
                $this->user = User::with(['projects', 'education', 'workExperience', 'socialLink'])->findOrFail($userId[0]);
            } else {
                $this->user = User::with(['projects', 'education', 'workExperience', 'socialLink'])->findOrFail(Auth::id());
            }

            //$this->projects = $this->user->projects()->latest()->get();
        }

    public function render()
    {
        return view('livewire.profile-component', [
            'user_details' => $this->user,
            'projects' => $this->user->projects()->latest()->paginate(5), // paginate
            'education' => $this->user->education,
            'work_experience' => $this->user->workExperience,
            'social_link' => $this->user->socialLink,
        ])->layout('layouts.master');
    }
}
