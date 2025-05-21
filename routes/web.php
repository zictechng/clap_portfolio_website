<?php

use App\Http\Controllers\Auth\LoginAuthenticatedSessionController;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\User\DataPortfolioStep;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\UserLoginComponent;
use App\Http\Livewire\UserRegisterComponent;
use App\Http\Livewire\TestimonialComponent;
use App\Http\Livewire\IndividualProjectComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\User\EditProfile;
use App\Http\Livewire\User\MyPortfolio;
use App\Http\Livewire\User\NewProject;
use App\Http\Livewire\User\UserCredentials;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserStoreCredentials;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectInteractionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Livewire\User\EditProjectComponent;
use App\Http\Livewire\VerifyAccount;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Generate routes goes here
Route::get('/', HomeComponent::class)->name('home');
Route::get('/testimonial', TestimonialComponent::class);
Route::get('/project/{slug}', IndividualProjectComponent::class)->name('project.details');
Route::get('/profile', ProfileComponent::class);

Route::get('/user-login', UserLoginComponent::class)->name('user-login');
Route::get('/user-register', UserRegisterComponent::class);

Route::get('/activate-account', VerifyAccount::class)->name('activate-account');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register');
Route::post('/otp_activation', [RegisteredUserController::class, 'ActivateAccount'])
    ->name('otp_activation');

    Route::post('/otp_resend', [RegisteredUserController::class, 'resendOtp'])
    ->name('otp_resend');

Route::post('/login', [LoginAuthenticatedSessionController::class, 'store'])
->name('login');


Route::post('/project/{id}/like', [ProjectInteractionController::class, 'like'])
->name('project.like');

Route::post('/project/{id}/comment', [ProjectInteractionController::class, 'comment'])
->name('project.comment');

Route::get('/profile/{user}', ProfileComponent::class)->name('user.profile');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Secured route goes here

// User::middleware
Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
    Route::get('/user/portfolio-steps', DataPortfolioStep::class)->name('user.portfolio-steps');
    Route::get('/user/edit-profile', EditProfile::class)->name('user.edit-profile');
    Route::get('/user/new-project', NewProject::class)->name('user.new-project');
    Route::get('/user/portfolio', MyPortfolio::class)->name('user.my-portfolio');
    Route::get('/user/profile', UserProfileComponent::class)->name('user.user-profile-component');
    Route::get('/user/user-store-credentials', UserStoreCredentials::class)->name('user.user-store-credentials');



    // All post url goes here
    //Route::post('/user/add-project', NewProject::class)->name('user.new-project');
    Route::post('/user/add-project', [ProjectController::class, 'add_newProject'])->name('user.add-project');
    Route::post('/user/project-tools', [ProjectController::class, 'project_tools'])->name('user.project-tools');
    Route::post('/user/embed-media', [ProjectController::class, 'save_EmbedMedia'])->name('user.embed-media');

    Route::post('/user/update-photo', [UserProfileController::class, 'updateProfilePhoto'])->name('user.update-photo');

    Route::post('/user/update-banner', [UserProfileController::class, 'updateBannerImage'])->name('user.update-banner');

    Route::post('/user/update-profile', [UserProfileController::class, 'updateProfile'])->name('user.update-profile');
    Route::post('/user/update-social', [UserProfileController::class, 'updateSocial'])->name('user.update-social');

    Route::post('/user/work-experience', [UserProfileController::class, 'workExperience'])->name('user.work-experience');

    Route::post('/user/add-education', [UserProfileController::class, 'addEducation'])->name('user.add-education');

    Route::post('/user/web-link', [UserProfileController::class, 'updateWebLink'])->name('user.web-link');

    Route::post('/user/password_update', [UserProfileController::class, 'passwordUpdate'])->name('user.password_update');

    Route::post('/user/update_preferences', [UserProfileController::class, 'updatePreference'])->name('user.update_preferences');

    //edit project route
    Route::get('/user/edit-project/{id}', EditProjectComponent::class)->name('user.edit-project');

    Route::post('/user/update-project', [ProjectController::class, 'updateUserProject'])->name('user.update-project');

    Route::post('/user/updateProject-tools', [ProjectController::class, 'updateUserProjectTools'])->name('user.updateProject-tools');

    Route::post('/user/updateEmbed-media', [ProjectController::class, 'updateEmbedMedia'])->name('user.updateEmbed-media');

    Route::post('/user/delete-project', [ProjectController::class, 'deleteUserProject'])->name('user.delete-project');



});


// Admin::middleware
Route::middleware(['auth:sanctum','verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');;
});
