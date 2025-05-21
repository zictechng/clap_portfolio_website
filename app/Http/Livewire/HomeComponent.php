<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $user = Auth::user();
        // Fetch products in random order with pagination (e.g., 12 per page)
    $project = Project::inRandomOrder()->with('user')->paginate(12);
    $project_slide = Project::inRandomOrder()->with('user')->limit(50)->get();

    //$projects = Project::with('user')->paginate(10);

        return view('livewire.home-component', ['user_details' => $user, 'project_data' =>$project, 'hero_project' =>$project_slide])->layout('layouts.master');
    }

}
