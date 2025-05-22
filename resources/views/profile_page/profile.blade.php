@php use Illuminate\Support\Str; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <title>profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./dashboardAsset/css/dashboardStyle.css">
  <link rel="stylesheet" href="./dashboardAsset/css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="page_dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-4 col-12">
                    <div class="side_ber_section">
                        <div class="side_ber_inner_section">
                            <div class="siedeber_item">
                                <div class="side_ber_item_header">
                                   <div class="com_bine">
                                    <span class="controll_icon">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <span class="controll_text">
                                        My Profile
                                    </span>
                                   </div>
                                    <span class="controll_icon">
                                        <i class="fa-solid fa-angle-up"></i>
                                    </span>
                                </div>

                            </div>
                            <div class="sideber_item_body">
                                <ul class="tabs">
                                    <li class="tab active" data-tab="basic-info">
                                        <a href="javascript:void(0)">
                                            Basic Information
                                        </a>
                                    </li>
                                    <li class="tab" data-tab="banner">
                                        <a href="javascript:void(0)">
                                            Banner
                                        </a>
                                    </li>
                                    <li class="tab" data-tab="social">
                                        <a href="javascript:void(0)">
                                            Social
                                        </a>
                                    </li>
                                    <li class="tab" data-tab="work-experience">
                                        <a href="javascript:void(0)">
                                            Work Experience
                                        </a>
                                    </li>
                                    <li class="tab" data-tab="education">
                                        <a href="javascript:void(0)">
                                            Education
                                        </a>
                                    </li>
                                    <li class="tab" data-tab="links">
                                        <a href="javascript:void(0)">
                                            Links
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="siedeber_item">
                                {{-- <div class="side_ber_item_header">
                                   <div class="com_bine">
                                    <span class="controll_icon">
                                        <i class="fa-solid fa-shield"></i>
                                    </span>
                                    <span class="controll_text">
                                        Security
                                    </span>
                                   </div>
                                    <span class="controll_icon">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </span>
                                </div> --}}

                            </div>
                            <div class="siedeber_item">
                                {{-- <div class="side_ber_item_header">
                                   <div class="com_bine">

                                    <span class="controll_text">
                                        Preferences
                                    </span>
                                   </div>
                                    <span class="controll_icon">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </span>
                                </div> --}}
                                <div class="sideber_item_body">
                                    <ul class="tabs">
                                        <li class="tab" data-tab="preferences">
                                            <a href="javascript:void(0)">
                                                <span class="controll_icon">
                                                    <i class="fa-solid fa-sliders"></i>
                                                </span>
                                                 Preferences
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8 col-xl-9 col-md-8 col-12">
                    <div class="content">

                        {{-- Add Profile here --}}
                        <div id="basic-info" class="tab-content active">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header">
                                        <h4>
                                            Basic Information
                                        </h4>
                                    </div>
                                    <div class="profile_image_controller d-flex align-items-center gap-3 justify-content-between">
                                        <div class="combo mb-4 d-flex align-items-center gap-2">
                                            <div class="profile_images">
                                                @if(!empty($user_details->profile_url) && file_exists(public_path('profile_images/' . $user_details->profile_url)))
                                                    <img src="{{ asset('profile_images/' . $user_details->profile_url) }}" alt="Profile Image" style="max-width: 80px; height: 80px;" class="rounded-circle object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('assets/img/team/user_profile.png') }}" alt="Default Image" style="width: 80px; height: auto;">
                                                @endif

                                                {{-- <img src="{{asset('dashboardAsset/images/profile_pics.png')}}" alt="" srcset=""> --}}
                                            </div>
                                            <div class="profile_image_content">
                                                <h4>My Profile</h4>

                                            </div>
                                        </div>
                                        <div class="image_upload_button">
                                            <a href="/user/edit-profile" type="button" class="theme_border_btns">Manage profile</a>
                                        </div>
                                    </div>
                                    <div class="dashboard_body">
                                        <div class="row">
                                            <div class="col-lg-6  col-12">
                                                <div class="profile_input_item">
                                                    <label for="first_name">First name</label>
                                                    <div class="input_item">
                                                        <input type="text"
                                                        value="{{ $user_details->name }}" placeholder="First Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6  col-12">
                                                <div class="profile_input_item">
                                                    <label for="first_name">Last name</label>
                                                    <div class="input_item">
                                                        <input type="text"
                                                        value="{{ $user_details->lname }}"  placeholder="Last Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $hashid = \Vinkla\Hashids\Facades\Hashids::encode($user_details->id);
                                            @endphp
                                            <div class="col-lg-9 col-8  col-md-6 col-12">
                                                <div class="profile_input_item">
                                                    <label for="first_name">Profile URL</label>
                                                    <div class="input_item">
                                                        <input type="text"
                                                        value="{{ url('/profile/'.$hashid) }}"
                                                        id="profile_url"
                                                        placeholder="Profile URL" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="profile_input_item">
                                                    <label for="first_name"></label>
                                                    <button class="copy_button_link" onclick="copyProfileUrl()">Copy Link</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="first_name">Email address</label>
                                                    <div class="input_item">
                                                        <input type="text"
                                                        value="{{ $user_details->email }}"  placeholder="Email address" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="Occupation">Occupation</label>
                                                    <div class="input_item">
                                                        <input type="text"
                                                        value="{{ $user_details->user_occupation }}"  name="Occupation" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Company</label>
                                                    <div class="input_item">
                                                        <input type="text"
                                                        value="{{ $user_details->user_company }}"  name="company" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Biography</label>
                                                    <div class="input_item">
                                                        <textarea name="" id="" readonly>{{ Str::limit($user_details->user_biography, 1500) }} </textarea>
                                                        <span>1500 characters remaining</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Add banner here --}}
                        <div id="banner" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header">
                                        <h4>
                                            Banner
                                        </h4>
                                        <p>
                                            Upload a banner, this improves the appearance of your project profile
                                        </p>
                                    </div>
                                    <div class="file_upload_areas">
                                        <div class="file_upload_area">
                                            <input type="file" name="" id="">
                                        </div>
                                        <div class="upload_of_content">
                                            <div class="inner_upload_of_content">
                                                @if(!empty($user_details->user_profile_banner) && file_exists(public_path('profile_images/' . $user_details->user_profile_banner)))
                                                    <img src="{{ asset('profile_images/' . $user_details->user_profile_banner) }}" alt="project Image" style="max-width: 90%; height: auto; border-radius: 12px">
                                                @else
                                                    <h4>No Banner uploaded</h4>
                                                    <p>
                                                        Go to manage profile and upload profile banner
                                                    </p>
                                                @endif

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Add social media --}}
                        <div id="social" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header">
                                        <h4>
                                            Social Links
                                        </h4>
                                        <p>
                                            Add links to your professional social account profiles.
                                        </p>
                                    </div>
                                    <div class="dashboard_body mt-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="profile_input_item">
                                                    <label for="Linkedin">Linkedin</label>
                                                    <div class="input_item">
                                                        <input type="text" value="{{ $social_details?->social_linkedin }}" placeholder="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="profile_input_item">
                                                    <label for="Occupation">Github</label>
                                                    <div class="input_item">
                                                        <input type="text" value="{{ $social_details?->social_github }}" readonly placeholder="Github">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Company</label>
                                                    <div class="input_item">
                                                        <input type="text" value="{{ $social_details?->social_company }}" placeholder="Company" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Youtube</label>
                                                    <div class="input_item">
                                                        <input type="text" value="{{ $social_details?->social_youtube }}" placeholder="Youtube" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-12">
                                                <div class="submition_btn text-right">
                                                    <button class="copy_button_link">Save</button>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Add Work experience --}}
                        <div id="work-experience" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header">
                                        <h4>
                                            Work Experience
                                        </h4>
                                        <p>
                                            Overview of your work experience in your profile
                                        </p>
                                    </div>
                                    <div class="dashboard_body">
                                        @foreach ($work_experience as $work_experiences)
                                        <div class="add_exp_btn">
                                            <div class="exp_items">
                                                <div class="exp_items_header d-flex align-items-center justify-content-space-between">
                                                    <h4>{{ $work_experiences->job_title }}</h4>

                                                </div>
                                                <div class="inner_wrapers_items">
                                                    <h4>{{ $work_experiences->job_organization }}</h4>
                                                    <h4>
                                                        {{ \Carbon\Carbon::parse($work_experiences->job_start_date)->format('d M, Y') }}
                                                            -
                                                            @if ($work_experiences->job_end_date)
                                                                {{ \Carbon\Carbon::parse($work_experiences->job_end_date)->format('d M, Y') }}
                                                            @else
                                                                Till date
                                                            @endif
                                                        </h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        {{-- <div class="add_work_exp_btn">
                                            <button data-bs-toggle="modal" data-bs-target="#myModal">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M6 12H18M12 18V6" stroke="#155CC8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                      </svg>
                                                </span>
                                                Add Work Experience
                                            </button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Add Eduction here --}}
                        <div id="education" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header">
                                        <h4>
                                            Educational Qualifications
                                        </h4>
                                        <p>
                                            Add your education to your profile here
                                        </p>
                                    </div>
                                    <div class="dashboard_body">
                                        @foreach ($user_education as $user_educations )
                                        <div class="add_exp_btn">

                                            <div class="exp_items">
                                                <div class="exp_items_header d-flex align-items-center justify-content-space-between">
                                                    <h4>{{ $user_educations->degree_name }}</h4>

                                                </div>
                                                <div class="inner_wrapers_items">
                                                    {{-- <h4><strong>{{ $user_educations->degree_name }} </strong></h4> --}}
                                                    <h4>{{ $user_educations->institution_name }}</h4>
                                                    <h4>{{ \Carbon\Carbon::parse($user_educations->start_date)->format('d M, Y') }} - {{ \Carbon\Carbon::parse($user_educations->end_date)->format('d M, Y') }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Add additional link here --}}
                        <div id="links" class="tab-content">
                            <div class="dash_board_card">
                                <div class="dashboard_header mb-4">
                                    <h4>
                                        Additional Links
                                    </h4>
                                    <p>Add your website other links you consider useful to your profile here</p>
                                </div>
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_body">
                                        <div class="row">

                                            <div class="col-lg-9 col-8  col-md-6 col-12">
                                                <div class="profile_input_item">

                                                    <div class="input_item">
                                                        <input type="text" value="{{ $user_details->web_link }}" placeholder="Enter your website URL " readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="profile_input_item">

                                                    <button class="copy_button_link">Add link</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Password change here --}}
                        <!-----------------------------------------------------security---------------------------------------->
                        <div id="security" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header mb-4">
                                        <h4>
                                            Security
                                        </h4>
                                        <p>Change your email address and password</p>
                                    </div>

                                    <div class="dashboard_body">
                                        <div class="row">

                                            <div class="col-lg-12    col-md-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="email_address">New email address</label>
                                                    <div class="input_item">
                                                        <input type="text" name="email_address">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="company">New password </label>
                                                    <div class="input_item">
                                                        <input type="text" name="company">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Confirm password</label>
                                                    <div class="input_item">
                                                        <input type="text" name="company">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="submition_btn text-right">
                                                    <button class="copy_button_link">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Preferences Section here --}}
                        <div id="preferences" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header mb-4">
                                        <h4>
                                            Preferences
                                        </h4>
                                        <p>Change your email address and password</p>
                                    </div>

                                    <div class="dashboard_body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="pr_switch_label">
                                                    <h4>
                                                        Email
                                                    </h4>
                                                    <p>
                                                        Indicate how you would love to receive notifications about activity on your profile
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="profile_input_item height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" {{ $preference?->like_notify ? 'checked' : '' }}
                                                        style="cursor: pointer;">
                                                        <label class="form-check-label" for="mySwitch">
                                                            <h4>Likes</h4>
                                                            <p>Get notified via email when someone likes your project</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="mySwitch2" name="darkmode" value="yes" {{ $preference?->comment_notify ? 'checked' : '' }}
                                                        style="cursor: pointer;">
                                                        <label class="form-check-label" for="mySwitch2">
                                                            <h4>Comments</h4>
                                                            <p>Get notified via email when someone comments on your project</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="mySwitch3" name="darkmode" value="yes" {{ $preference?->share_notify ? 'checked' : '' }}
                                                        style="cursor: pointer;">
                                                        <label class="form-check-label" for="mySwitch3">
                                                            <h4>Share</h4>
                                                            <p>Get notified via email when someone shares your project</p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="pr_switch_label">
                                                    <h4>
                                                        Show social links
                                                    </h4>
                                                    <p>
                                                        Manage the visibility of your social links and others in your profile
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="profile_input_item height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="c1s" name="darkmode" value="yes" {{ $preference?->show_social_link ? 'checked' : '' }}
                                                        style="cursor: pointer;">
                                                        <label class="form-check-label" for="c1s">
                                                            <h4>Show social links</h4>
                                                            <p>When turn on, this will show your social links in your profile</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="c2s" name="darkmode" value="yes" {{ $preference?->show_education ? 'checked' : '' }}
                                                        style="cursor: pointer;">
                                                        <label class="form-check-label" for="c2s">
                                                            <h4>Show education</h4>
                                                            <p>If turn on, it will show your education in your profile</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="c3s" name="darkmode" value="yes" {{ $preference?->show_work_experience ? 'checked' : '' }}
                                                        style="cursor: pointer;">
                                                        <label class="form-check-label" for="c3s">
                                                            <h4>Show work experience</h4>
                                                            <p>When turn on this will show your work experience in your profile</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="c4s" name="darkmode" value="yes" {{ $preference?->show_other_link ? 'checked' : '' }}
                                                        style="cursor: pointer;">
                                                        <label class="form-check-label" for="c4s">
                                                            <h4>Show additional links</h4>
                                                            <p>Display other link in your profile</p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------popup_section----------------------->
    {{-- Work experience here --}}
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="corner-modal-header">

              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="dashboard_body popup_body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Job-title">Job title</label>
                                <div class="input_item">
                                    <input type="text" name="Job-title" placeholder="Ex. Data scientist">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Company/Organization">Company/Organization</label>
                                <div class="input_item">
                                    <input type="text" name="organization">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  col-md-6 col-12">
                            <div class="profile_input_item">
                                <label for="first_name">Start date</label>
                                <div class="input_item">
                                    <input type="text" placeholder="DD/MM/YY">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6   col-md-6 col-12">
                            <div class="profile_input_item">
                                <label for="first_name">End date</label>
                                <div class="input_item">
                                    <input type="text" placeholder="DD/MM/YY">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12  col-12">
                            <div class="custom_check_box">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" >
                                    <label class="form-check-label">I currently work here</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="submition_btn ">
                                <button class="copy_button_link">Add work experience</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
    </div>
<!-----------------------Delete popup sections------------------>
    {{-- Delete Work experience here --}}
    <div class="modal" id="ask_delete">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="corner-modal-header">

              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="dashboard_body popup_body">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="profile_delete_item">
                                <div class="alert_icons">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <g clip-path="url(#clip0_439_1880)">
                                              <rect width="32" height="32" fill="#DF3A3A"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.80812 1.00421C9.45111 0.361223 10.3232 0 11.2325 0H20.7675C21.6768 0 22.5489 0.361223 23.1918 1.00421L30.9959 8.80812C31.6389 9.45111 32 10.3232 32 11.2325V20.7675C32 21.6768 31.6389 22.5489 30.9959 23.1918L23.1918 30.9959C22.5489 31.6389 21.6768 32 20.7675 32H11.2325C10.3232 32 9.45111 31.6389 8.80812 30.9959L1.00421 23.1918C0.361223 22.5489 0 21.6768 0 20.7675V11.2325C0 10.3232 0.361223 9.45111 1.00421 8.80812L8.80812 1.00421ZM16 7.14286C16.9468 7.14286 17.7143 7.91038 17.7143 8.85714V16.2857C17.7143 17.2325 16.9468 18 16 18C15.0532 18 14.2857 17.2325 14.2857 16.2857V8.85714C14.2857 7.91038 15.0532 7.14286 16 7.14286ZM18.2857 22.5714C18.2857 23.8338 17.2624 24.8571 16 24.8571C14.7376 24.8571 13.7143 23.8338 13.7143 22.5714C13.7143 21.3091 14.7376 20.2857 16 20.2857C17.2624 20.2857 18.2857 21.3091 18.2857 22.5714Z" fill="white"/>
                                            </g>
                                            <defs>
                                              <clipPath id="clip0_439_1880">
                                                <rect width="32" height="32" fill="white"/>
                                              </clipPath>
                                            </defs>
                                          </svg>
                                    </span>
                                </div>
                                <h4>Delete Work Experience</h4>
                                <p>Are you sure you want to delete this work experience? This action cannot be undone</p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="submition_btn align-items-center btn_center">
                                <button class="copy_button_link">No, Return</button>
                                <button class="copy_button_link delete_buttons">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
    </div>
    <!---------------------------------education popup ------------------>
    {{-- Add Education Here --}}
    <div class="modal" id="education_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="corner-modal-header">

              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="dashboard_body popup_body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Job-title">Degree</label>
                                <div class="input_item">
                                    <input type="text" name="Job-title" placeholder="Ex. Data scientist">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Institution">Institution</label>
                                <div class="input_item">
                                    <input type="text" name="Institution">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  col-md-6 col-12">
                            <div class="profile_input_item">
                                <label for="first_name">Start date</label>
                                <div class="input_item">
                                    <input type="text" placeholder="DD/MM/YY">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6   col-md-6 col-12">
                            <div class="profile_input_item">
                                <label for="first_name">End date</label>
                                <div class="input_item">
                                    <input type="text" placeholder="DD/MM/YY">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="submition_btn ">
                                <button class="copy_button_link">Add education</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
    </div>

    {{-- Delete Eduction Here --}}
    <div class="modal" id="ask_delete_education">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="corner-modal-header">

              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="dashboard_body popup_body">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="profile_delete_item">
                                <div class="alert_icons">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <g clip-path="url(#clip0_439_1880)">
                                              <rect width="32" height="32" fill="#DF3A3A"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.80812 1.00421C9.45111 0.361223 10.3232 0 11.2325 0H20.7675C21.6768 0 22.5489 0.361223 23.1918 1.00421L30.9959 8.80812C31.6389 9.45111 32 10.3232 32 11.2325V20.7675C32 21.6768 31.6389 22.5489 30.9959 23.1918L23.1918 30.9959C22.5489 31.6389 21.6768 32 20.7675 32H11.2325C10.3232 32 9.45111 31.6389 8.80812 30.9959L1.00421 23.1918C0.361223 22.5489 0 21.6768 0 20.7675V11.2325C0 10.3232 0.361223 9.45111 1.00421 8.80812L8.80812 1.00421ZM16 7.14286C16.9468 7.14286 17.7143 7.91038 17.7143 8.85714V16.2857C17.7143 17.2325 16.9468 18 16 18C15.0532 18 14.2857 17.2325 14.2857 16.2857V8.85714C14.2857 7.91038 15.0532 7.14286 16 7.14286ZM18.2857 22.5714C18.2857 23.8338 17.2624 24.8571 16 24.8571C14.7376 24.8571 13.7143 23.8338 13.7143 22.5714C13.7143 21.3091 14.7376 20.2857 16 20.2857C17.2624 20.2857 18.2857 21.3091 18.2857 22.5714Z" fill="white"/>
                                            </g>
                                            <defs>
                                              <clipPath id="clip0_439_1880">
                                                <rect width="32" height="32" fill="white"/>
                                              </clipPath>
                                            </defs>
                                          </svg>
                                    </span>
                                </div>
                                <h4>Delete Education</h4>
                                <p>Are you sure you want to delete this Educational qualification? This action cannot be undone</p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="submition_btn align-items-center btn_center">
                                <button class="copy_button_link">No, Return</button>
                                <button class="copy_button_link delete_buttons">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./dashboardAsset/js/script.js"></script>
</body>

<script>
    function copyProfileUrl() {
        const input = document.getElementById("profile_url");
        input.select();
        input.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the input
        navigator.clipboard.writeText(input.value)
            .then(() => {
                alert("Profile URL copied to clipboard!");
            })
            .catch(err => {
                console.error('Failed to copy: ', err);
            });
    }
</script>
</html>
