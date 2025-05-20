<?php

namespace App\Http\Controllers;

use App\Models\EmbedMedia;
use App\Models\Project;
use App\Models\ProjectTools;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    //
    public $project_title;
    public $project_concept;
    public $project_description;
    public $project_status;
    public $project_feature;
    public $project_image;
    public $user_uid;
    public $user_email;



    public function add_newProject(Request $request)
    {

        // Validate the request
        $validated = $request->validate([
            'project_title' => 'required|string|max:200',
            'project_concept' => 'required|string|max:150',
            'project_description' => 'required|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ], [
            'image.max' => 'The project image size should not exceed 5MB.',
        ]);

        $user = auth()->user();
        $transactionTrackId = $this->generateTransactionId();
        $project = new Project();

        // $project->user_uid = $user->id;
        // $project->user_email =$user->email;
        // $project->project_title = Str::limit($request->input('project_title'), 200);
        // $project->project_concept = Str::limit($request->input('project_concept'), 255);
        // $project->project_description = $request->project_description;

        $project->user_uid = $user->id;
        $project->user_email = $user->email;
        $project->project_title = $validated['project_title'];
        $project->project_concept = $validated['project_concept'];
        $project->project_description = $validated['project_description'];
        $project->project_tag_id = $transactionTrackId;
        $project->project_tag = $transactionTrackId;

        // $image = $request->image;
        // $imageName=time().'.'.$image->getClientOriginalExtension();
        // $request->image->move('project_image', $imageName);

        // $project->project_image = $imageName;

        // Save the project image
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('project_images'), $imageName);
        $project->project_image = $imageName;
        }
        $project->save();
        session(['transaction_id' => $transactionTrackId]);
        return redirect()->back()->with('message', 'Project created successfully!');
    }

    protected function generateTransactionId(): string
        {
            return 'CLAM' . strtoupper(Str::random(10)) . '-' . now()->format('YmdHis');
        }

        // function to save the project tools use for the project
        public function project_tools(Request $request)
            {
                $user = auth()->user();

                // Validate input field
                $validated = $request->validate([
                    'tool_data_url' => 'nullable|url|max:255',
                    'project_tag' => 'required|string|max:200',
                ], [
                    'tool_data_url.url' => 'Please enter a valid data source URL if provided.',
                    'tool_data_url.max' => 'URL cannot exceed 255 characters.',
                    'project_tag.required' => 'You are required to create a project first.',
                    'project_tag.string' => 'The project tag must be valid text.',
                    'project_tag.max' => 'The project tag cannot be longer than 200 characters.',
                ]);

                // Collect selected tools
                $selectedTools = collect([
                    $request->input('tool_ms_excel'),
                    $request->input('tool_python'),
                    $request->input('tool_sql'),
                    $request->input('tool_apache'),
                    $request->input('tool_tableau'),
                    $request->input('tool_power_bi'),
                    $request->input('tool_other'),
                ])->filter()->values();

                // Validate at least one tool is selected
                if ($selectedTools->isEmpty()) {
                    return back()->withErrors(['tools' => 'Please select at least one tool.'])->withInput();
                }

                // Get current project details
                $project_details = Project::where('project_tag_id', $request->project_tag)->first();

                if (!$project_details) {
                    return back()->withErrors(['project_tag' => '`current project session has expired! Create a project first.'])->withInput();
                }

                // Loop and save tools
                $allSaved = true;

                foreach ($selectedTools as $toolName) {
                    $project_tool = new ProjectTools();
                    $project_tool->user_uid = $user->id;
                    $project_tool->project_id = $project_details->id;
                    $project_tool->user_email = $user->email;
                    $project_tool->project_tools = $toolName;
                    $project_tool->data_url_source = $validated['tool_data_url'] ?? null;

                    if (!$project_tool->save()) {
                        $allSaved = false;
                    }
                }

                // Return based on save status
                if ($allSaved) {
                    return back()->with('message', 'Tools saved successfully!');
                } else {
                    return back()->withErrors(['error' => 'Failed to save all tools. Please try again.'])->withInput();
                }
            }


        // function for embed media goes here
        public function save_EmbedMedia(Request $request)
            {
                $user = auth()->user();

                // Validate input field
                $validated = $request->validate([
                    'media_name' => 'nullable|max:100',
                    'project_tag' => 'required|string|max:200',
                ], [
                    'media_name.string' => 'Please enter a valid text.',
                    'media_name.max' => 'Media name cannot exceed 255 characters if required.',
                    'project_tag.required' => 'You are required to create a project first.',
                    'project_tag.string' => 'The project tag must be valid text.',
                    'project_tag.max' => 'The project tag cannot be longer than 200 characters.',
                ]);

                // Validate at least one input is selected
                $selectedTools = collect([
                    $request->input('media_name'),
                    $request->input('embed_ratio'),
                    $request->input('embed_type'),
                ])->filter()->values();

                if ($selectedTools->isEmpty()) {
                    return back()->withErrors(['embed_error' => 'You cannot submit an empty request. Please enter a value.'])->withInput();
                }

                // Get current project details
                $project_details = Project::where('project_tag_id', $request->project_tag)->first();

                if (!$project_details) {
                    return back()->withErrors(['embed_error' => 'Current project session has expired! Please, create a project first.'])->withInput();
                }

                // Save embed media
                $embed_media = new EmbedMedia();
                $embed_media->user_uid = $user->id;
                $embed_media->project_id = $project_details->id;
                $embed_media->user_email = $user->email;
                $embed_media->embed_media_name = $validated['media_name'] ?? null;
                $embed_media->embed_media_type = $request->embed_type;
                $embed_media->embed_media_ratio = $request->embed_ratio;

                if ($embed_media->save()) {
                    return back()->with('message', 'Embed media saved successfully!');
                } else {
                    return back()->withErrors(['error' => 'Failed to save embed media. Please try again.'])->withInput();
                }
            }


        // function to update the project
        public function updateUserProject(Request $request)
            {
                // Validate the request
                $validated = $request->validate([
                    'project_id' => 'required|exists:projects,id',
                    'project_title' => 'required|string|max:200',
                    'project_concept' => 'required|string|max:150',
                    'project_description' => 'required|string|max:2000',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ], [
                    'image.max' => 'The project image size should not exceed 5MB.',
                ]);

                $user = auth()->user();
                $project = Project::findOrFail($validated['project_id']);

                $project->project_title = $validated['project_title'];
                $project->project_concept = $validated['project_concept'];
                $project->project_description = $validated['project_description'];

                if ($request->hasFile('image')) {
                    // Delete old image if exists
                    if ($project->project_image && file_exists(public_path('project_images/' . $project->project_image))) {
                        unlink(public_path('project_images/' . $project->project_image));
                    }

                    // Store new image
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('project_images'), $imageName);

                    // Update project image
                    $project->project_image = $imageName;
                }

                if ($project->isDirty() && $project->save()) {
                    return redirect()->back()->with('message', 'Project updated successfully!');
                } else {
                    return redirect()->back()->with('error', 'Sorry, no changes in your project or failed to update project.');
                }
            }

        // function to update the project tools
        public function updateUserProjectTools(Request $request)
        {
            // Validate the request
            $user = auth()->user();

                // Validate input field
                $validated = $request->validate([
                    'project_id' => 'required|exists:projects,id',
                    'tool_data_url' => 'nullable|url|max:255',
                    ], [
                    'tool_data_url.url' => 'Please enter a valid data source URL if provided.',
                    'tool_data_url.max' => 'URL cannot exceed 255 characters.',
                    ]);

                // Collect selected tools
                $selectedTools = collect([
                    $request->input('tool_ms_excel'),
                    $request->input('tool_python'),
                    $request->input('tool_sql'),
                    $request->input('tool_apache'),
                    $request->input('tool_tableau'),
                    $request->input('tool_power_bi'),
                    $request->input('tool_other'),
                ])->filter()->values();

                // Validate at least one tool is selected
                if ($selectedTools->isEmpty()) {
                    return back()->withErrors(['tools' => 'Please select at least one tool.'])->withInput();
                }

                // Get current project details

                $project_details = Project::findOrFail($validated['project_id']);

                if (!$project_details) {
                    return back()->withErrors(['project_tag' => 'current project session has expired! Try again.'])->withInput();
                }

                // Loop and save tools
                $allSaved = true;
                // Delete existing tools for this project before adding new ones
                ProjectTools::where('project_id', $validated['project_id'])->delete();

                foreach ($selectedTools as $toolName) {
                    $project_tool = new ProjectTools();
                    $project_tool->user_uid = $user->id;
                    $project_tool->project_id = $project_details->id;
                    $project_tool->user_email = $user->email;
                    $project_tool->project_tools = $toolName;
                    $project_tool->data_url_source = $validated['tool_data_url'] ?? null;

                    if (!$project_tool->save()) {
                        $allSaved = false;
                    }
                }

                // Return based on save status
                if ($allSaved) {
                    return back()->with('message', 'Tools update successfully!');
                } else {
                    return back()->withErrors(['error' => 'Failed to update the tools. Please try again.'])->withInput();
                }
        }

        // function for update embed media goes here
        public function updateEmbedMedia(Request $request)
            {
                $user = auth()->user();

                // Validate input field
                $validated = $request->validate([
                    'project_id' => 'required|exists:projects,id',
                    'media_name' => 'nullable|max:100',
                    ], [
                    'media_name.string' => 'Please enter a valid text.',
                    'media_name.max' => 'Media name cannot exceed 255 characters if required.',
                    ]);

                // Validate at least one input is selected
                $selectedTools = collect([
                    $request->input('media_name'),
                    $request->input('embed_ratio'),
                    $request->input('embed_type'),
                ])->filter()->values();

                if ($selectedTools->isEmpty()) {
                    return back()->withErrors(['embed_error' => 'You cannot submit an empty request. Please enter a value.'])->withInput();
                }

                // Get current project details

                $project_details = Project::findOrFail($validated['project_id']);

                if (!$project_details) {
                    return back()->withErrors(['embed_error' => 'current project session has expired! Try again.'])->withInput();
                }
                // Delete existing tools for this project before adding new ones
                EmbedMedia::where('project_id', $validated['project_id'])->delete();

                // Save embed media
                $embed_media = new EmbedMedia();
                $embed_media->user_uid = $user->id;
                $embed_media->project_id = $project_details->id;
                $embed_media->user_email = $user->email;
                $embed_media->embed_media_name = $validated['media_name'] ?? null;
                $embed_media->embed_media_type = $request->embed_type;
                $embed_media->embed_media_ratio = $request->embed_ratio;

                if ($embed_media->save()) {
                    return back()->with('message', 'Embed media updated successfully!');
                } else {
                    return back()->withErrors(['error' => 'Failed to update embed media. Please try again.'])->withInput();
                }
            }

        // function to delete user project goes here
        public function deleteUserProject(Request $request)
            {
                $user = auth()->user();

                // Validate input
                $validated = $request->validate([
                    'project_id' => 'required|exists:projects,id',
                ]);

                // Get the project
                $project = Project::where('id', $validated['project_id'])->where('user_uid', $user->id)->first();

                if (!$project) {
                    return back()->withErrors(['error' => 'Project not found or access denied.'])->withInput();
                }

                // Attempt to delete
                if ($project->delete()) {
                    return redirect()->route('user.my-portfolio')->with('message', 'Project deleted successfully!');
                } else {
                    return back()->withErrors(['error' => 'Failed to delete the project. Please try again.'])->withInput();
                }
            }
}
