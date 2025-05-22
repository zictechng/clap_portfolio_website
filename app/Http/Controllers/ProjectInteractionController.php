<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SubscriberMailList;
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

    public function subscriberList(Request $request)
        {
            $request->validate([
                'phone_number' => ['required', 'regex:/^\+?[0-9\s\-]{10,20}$/'],
                'sub_email' => 'required|email|max:255',
            ], [
                'phone_number.regex' => 'Please enter a valid phone number.',
            ]);
            $ip = $request->ip();
            // Store the subscriber details in the database
            $subscriber = new SubscriberMailList();
            $subscriber->user_phone = $request->phone_number;
            $subscriber->user_email = $request->sub_email;
            $subscriber->ip_address = $ip; // Optional IP tracking

            if ($subscriber->save()) {
                return back()->with('message', 'Details added to list successfully!');
            } else {
                return back()->withErrors(['error' => 'Failed to add your details. Please try again.'])->withInput();
            }
        }
}
