<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;

use Livewire\Component;
use App\Models\Project;

class IndividualProjectComponent extends Component
{
    use WithPagination;
    public $project;

    public function mount($slug)
    {
        //$this->project = Project::with('user')->findOrFail($id);
        // $this->project = Project::with('user')->where('project_slug', $slug)->firstOrFail();
        $this->project = Project::with(['user', 'projectTools'])->where('project_slug', $slug)->firstOrFail();

    }

    public function render()
    {
        $project = $this->project;
        $userId = optional($this->project->user)->id;

        // Fetch more projects from the same user in random order
        $project_more = Project::inRandomOrder()
        ->with('user')
        ->where('user_uid', $userId)
        ->paginate(15);

        return view('livewire.individual-project-component', ['more_project'=>$project_more])->layout('layouts.master');
    }
}
