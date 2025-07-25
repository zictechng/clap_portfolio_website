<?php

namespace App\Http\Livewire\User;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class NewProject extends Component
{
    public $project_title;
    public $project_concept;
    public $project_description;
    public $project_status;
    public $project_feature;
    public $project_image;
    public $user_uid;
    public $user_email;


    public function render()
    {
        $user = Auth::user();
        return view('livewire.user.new-project', ['user_details' => $user])->layout('layouts.userMaster');
    }

        private function generateUniqueSlug($name)
            {
                $slug = Str::slug($name);
                $original = $slug;
                $count = 1;

                while (Project::where('project_slug', $slug)->exists()) {
                    $slug = $original . '-' . $count++;
                }

                return $slug;
            }

    // function to add new project
    public function addProject()
    {
        $user = auth()->user();
        $project = new Project();

        $project->user_uid = $user->id;
        $project->user_email =$user->email;
        $project->project_title = $this->project_title;
        $project->project_concept = $this->project_concept;
        $project->project_description = $this->project_description;
        $project->project_slug = $this->generateUniqueSlug($project->project_title);
        $project->save();
        session()->flash('message', 'Project added successfully!');
    }
}
