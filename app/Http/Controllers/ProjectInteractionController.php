<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectInteractionController extends Controller
{
    //like project function goes here

    public function like(Request $request, $projectId)
        {
            $project = Project::findOrFail($projectId);
            $ip = $request->ip();

            // Prevent duplicate like from same IP (or by same user)
            $query = $project->likes()->where('ip_address', $ip);

            if (auth()->check()) {
                // Also check if this user has liked
                $query->orWhere('user_id', auth()->id());
            }

            if (! $query->exists()) {

                $project->likes()->create([
                    'ip_address' => $ip,
                    'user_id' => auth()->id(), // null if not logged in
                ]);
                $project->increment('like_count');
            }

        return back()->with('message', 'Thanks for liking this project.');
     }

    //comment project function goes here
    public function comment(Request $request, $projectId)
        {
            $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'post_comment' => 'required|string|max:2500',
            ]);

            $project = Project::findOrFail($projectId);

            $project->comments()->create([
                'name'       => $request->name,
                'email'      => $request->email,
                'body'       => $request->post_comment, // Corrected field name
                'ip_address' => $request->ip(),
                'user_id'    => auth()->check() ? auth()->id() : null,
            ]);
            $project->increment('comment_count');
            // send a notification to the project owner
            // $project->user->notify(new CommentPosted($project));
            // Or any other notification you want to send
            return back()->with('message', 'Comment submitted.');
        }

}
