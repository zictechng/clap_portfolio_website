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
Route::get('/', HomeComponent::class);
Route::get('/testimonial', TestimonialComponent::class);
Route::get('/project', IndividualProjectComponent::class);
Route::get('/profile', ProfileComponent::class);

Route::get('/user-login', UserLoginComponent::class)->name('user-login');;
Route::get('/user-register', UserRegisterComponent::class);

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register');
Route::post('/login', [LoginAuthenticatedSessionController::class, 'store'])
->name('login');

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
    Route::post('/user/add-project', NewProject::class)->name('user.new-project');
    Route::post('/user/add-project', [NewProject::class, 'add_newProject'])->name('user.add-project');
});


// Admin::middleware
Route::middleware(['auth:sanctum','verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');;
});
