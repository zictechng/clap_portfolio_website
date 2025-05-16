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
                'project_concept' => 'required|string|max:255',
                'project_description' => 'required|string',
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

        $project->save();
        session(['transaction_id' => $transactionTrackId]);
        return redirect()->back()->with('message', 'Project added successfully!');
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


}
