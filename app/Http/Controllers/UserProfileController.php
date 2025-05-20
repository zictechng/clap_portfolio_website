<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\SocialLink;
use App\Models\SystemPreferences;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

        // function to update profile photo
        public function updateProfilePhoto(Request $request)
        {
            $user = User::find(Auth::id());
            // Validate image
            $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ], [
                'image.max' => 'The uploaded profile photo size should not exceed 5MB.',
            ]);

            if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->profile_photo_path && file_exists(public_path('profile_images/' . $user->profile_photo_path))) {
                unlink(public_path('profile_images/' . $user->profile_photo_path));
            }

            // Store new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);

            // Update user's image
            $user->profile_photo_path = $imageName;
            $user->profile_url = $imageName;
            }

            $user->save();

            return back()->with('message', 'Profile photo updated successfully.');
        }

        // function to update profile banner
        public function updateBannerImage(Request $request)
        {
            $user = User::find(Auth::id());
            // Validate image
            $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ], [
                'banner_image.max' => 'The uploaded profile banner size should not exceed 5MB.',
            ]);

            if ($request->hasFile('banner_image')) {
            // Delete old image if exists
            if ($user->user_profile_banner && file_exists(public_path('profile_images/' . $user->user_profile_banner))) {
                unlink(public_path('profile_images/' . $user->user_profile_banner));
            }

            // Store banner image
            $image = $request->file('banner_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);

            // Update user's image
            $user->user_profile_banner = $imageName;
            }
            $user->save();

            return back()->with('message', 'Profile banner updated successfully.');
        }

    // function to update profile details
        public function updateProfile(Request $request)
        {
            $user = User::find(Auth::id());

            $validated = $request->validate([
                'bio' => 'nullable|string|max:1500',
                'company' => 'nullable|string|max:255',
                'occupation' => 'nullable|string|max:255',
            ], [
                'bio.max' => 'Biography should not exceed 1500 characters.',
            ]);

            // Update fields
            $user->name = $request->input('name');
            $user->lname = $request->input('other_name');
            $user->user_company = $validated['company'];
            $user->user_occupation = $validated['occupation'];
            $user->user_biography = $validated['bio'];

            // Save changes if any
            if ($user->isDirty()) {
                $user->save();
                return back()->with('message', 'Profile updated successfully.');
            } else {
                return back()->with('message', 'No changes were made to the profile details.');
            }
        }

        // function to update social media links
        public function updateSocial(Request $request)
        {
            $user = Auth::user();

            // Validate the request
            $validated = $request->validate([
                'youtube' => 'nullable|url|max:255',
                'linkedin' => 'nullable|url|max:255',
                'github' => 'nullable|url|max:255',
                'company' => 'nullable|string|max:255',
            ]);

            // Update or create the record
            $socialLink = SocialLink::updateOrCreate(
                ['user_uid' => $user->id],
                [
                    'social_youtube' => $validated['youtube'] ?? null,
                    'social_linkedin' => $validated['linkedin'] ?? null,
                    'social_github' => $validated['github'] ?? null,
                    'social_company' => $validated['company'] ?? null,
                    'user_email' => $user->email,
                    'user_uid' => $user->id,
                ]
            );

            // Provide appropriate feedback
            if ($socialLink->wasRecentlyCreated) {
                return back()->with('message', 'Social media links added successfully.');
            } elseif ($socialLink->wasChanged()) {
                return back()->with('message', 'Social media links updated successfully.');
            } else {
                return back()->with('error', 'No changes were made to your social media links.');
            }
        }

        // function to add work experience details
        public function workExperience(Request $request)
        {
            $user = Auth::user();
            $work = new WorkExperience();

            // Validate the request
            $validated = $request->validate([
                'Job_title' => 'nullable|string|max:255',
                'job_company' => 'nullable|string|max:255',
                'job_date_start' => 'nullable|date|before_or_equal:today',
                'job_date_end' => 'nullable|date|before_or_equal:today',

            ]);

            // Assign data
            $work->user_uid = $user->id;
            $work->user_email = $user->email;
            $work->job_title = $validated['Job_title'];
            $work->job_organization = $validated['job_company'];
            $work->job_start_date = $validated['job_date_start'];
            $work->job_end_date = $validated['job_date_end']?? null;
            $work->job_active = $request->has('job_current') ? true : false;

            // Save and check
            if ($work->save()) {
                return back()->with('message', 'Work experience added successfully.');
            } else {
                return back()->with('error', 'Failed to add work experience. Please try again.');
            }
        }

    // function to add/update education details
     public function addEducation(Request $request)
        {
            $user = Auth::user();

            // Validate the request
            $validated = $request->validate([
                'edu_degree' => 'nullable|string|max:255',
                'edu_institution' => 'nullable|string|max:255',
                'edu_start_date' => 'nullable|date|before_or_equal:today',
                'edu_end_date' => 'nullable|date|before_or_equal:today',
            ]);

            // Check if at least one field has value
            $hasInput = collect($validated)->filter()->isNotEmpty();

            if (!$hasInput) {
                return back()->with('error', 'No data entered. Education record not added.');
            }

            // Create the education record
            $edu = new Education();
            $edu->user_uid = $user->id;
            $edu->user_email = $user->email;
            $edu->degree_name = $validated['edu_degree'] ?? null;
            $edu->institution_name = $validated['edu_institution'] ?? null;
            $edu->start_date = $validated['edu_start_date'] ?? null;
            $edu->end_date = $validated['edu_end_date'] ?? null;

            if ($edu->save()) {
                return back()->with('message', 'Education added successfully.');
            } else {
                return back()->with('error', 'Failed to add education. Please try again.');
            }
        }

        // function to update web link details
        public function updateWebLink(Request $request)
        {
            $user = User::find(Auth::id());

            // Validate the request
            $validated = $request->validate([
                'web_link_name' => 'nullable|url|max:255',
            ]);

            $newLink = $validated['web_link_name'] ?? null;

            // If nothing was entered, show error
            if (empty($newLink)) {
                return back()->with('error', 'Please enter a valid web link before submitting.');
            }

            // Only update if value changed
            if ($user->web_link !== $newLink) {
                $user->web_link = $newLink;

                if ($user->save()) {
                    return back()->with('message', 'Web link updated successfully.');
                } else {
                    return back()->with('error', 'Failed to update web link. Please try again.');
                }
            }

            return back()->with('message', 'No changes were made to the web link.');
        }


        // function to update user password details
        public function passwordUpdate(Request $request)
        {
            $user = User::find(Auth::id());

            // Validate input
            $validated = $request->validate([
                'email_address' => 'required|email|max:255',
                'new_password' => 'required|string|min:8|max:255',
                'confirm_password' => 'required|string|same:new_password',
            ], [
                'confirm_password.same' => 'Confirm password must match the new password.',
                'email_address.email' => 'Please enter a valid email address.',
            ]);

            // Optional: Check if email matches the logged-in user's email
            if ($validated['email_address'] !== $user->email) {
                return back()->with('error', 'Sorry, the email address does not match your account.');
            }

            // Update user current password
            $user->password = Hash::make($validated['new_password']);

            if ($user->save()) {
                return back()->with('message', 'Password updated successfully.');
            } else {
                return back()->with('error', 'Failed to update password. Please try again.');
            }
        }


        // function to update user preferences details
        public function updatePreference(Request $request)
        {
            $user = User::find(Auth::id());

            $preference = SystemPreferences::where('user_uid', $user->id)->first();

            // If no system preference exists, create a new one
            if (!$preference) {
                $preference = new SystemPreferences();
                $preference->user_uid = $user->id;
                $preference->user_email = $user->email;
            }

            $preference->like_notify = $request->has('email_like');
            $preference->comment_notify = $request->has('email_comment');
            $preference->share_notify = $request->has('email_share');
            $preference->show_social_link = $request->has('show_link');
            $preference->show_education = $request->has('show_edu');
            $preference->show_work_experience = $request->has('show_work_exp');
            $preference->show_other_link = $request->has('show_other');

            // Save and send respond
            if ($preference->save()) {
                return back()->with('message', 'System preference updated successfully.');
            } else {
                return back()->with('error', 'Failed to update system preference. Please try again.');
            }
        }





}
