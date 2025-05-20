<?php

namespace App\Http\Livewire\User;

use App\Models\EmbedMedia;
use App\Models\Project;
use App\Models\ProjectTools;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;

class EditProjectComponent extends Component
{
    public $project;
    public $data_tool;
    public $link;

    // Called when the component is initialized
    public function mount($id)
    {

        try {
            $decryptedId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404); // handle invalid or tampered ID
        }

        $this->project = Project::findOrFail($decryptedId);

    }

    public function render()
    {
        $user = Auth::user();
        $projectId = $this->project->id;

        // Fetch related project tools
        $this->data_tool = ProjectTools::where('project_id', $projectId)
            ->orderBy('created_at', 'desc')->get();

        // Fetch user-specific embed media
        $this->link = EmbedMedia::where('project_id', $projectId)
            ->orderBy('created_at', 'desc')->get()->first();

        return view('livewire.user.edit-project-component', [
            'project_details' => $this->project,
            'user_details' => $user,
            'tools' => $this->data_tool,
            'embed_links' => $this->link
        ])->layout('layouts.userMaster');
    }
}
