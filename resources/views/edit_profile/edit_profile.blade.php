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
                                        <i class="fa-solid fa-angle-down"></i>
                                    </span>
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
                            </div>
                            <div class="siedeber_item">
                                <div class="side_ber_item_header">
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
                                </div>
                                <div class="sideber_item_body">
                                    <ul class="tabs">
                                        <li class="tab active" data-tab="security">
                                            <a href="javascript:void(0)">
                                                Security
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="siedeber_item">
                                <div class="side_ber_item_header">
                                   <div class="com_bine">
                                    <span class="controll_icon">
                                        <i class="fa-solid fa-sliders"></i>
                                    </span>
                                    <span class="controll_text">
                                        Preferences
                                    </span>
                                   </div>
                                    <span class="controll_icon">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </span>
                                </div>
                                <div class="sideber_item_body">
                                    <ul class="tabs">
                                        <li class="tab active" data-tab="preferences">
                                            <a href="javascript:void(0)">
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
                        <div id="basic-info" class="tab-content active">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header">
                                        <h4>
                                            Basic Information
                                        </h4>
                                        {{-- <p>
                                            Add links to your professional social account profiles.
                                        </p> --}}
                                        <br/>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                                            {{Session::get('error')}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if(Session::has('message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert" role="alert">
                                            {{Session::get('message')}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="profile_image_controller d-flex align-items-center gap-3 justify-content-between">
                                        <div class="combo mb-4 d-flex align-items-center gap-2">
                                            <div class="profile_images">
                                                @if(!empty($user_details?->profile_url) && file_exists(public_path('profile_images/' . $user_details?->profile_url)))
                                                    <img src="{{ asset('profile_images/' . $user_details?->profile_url) }}" alt="Profile Image" style="max-width: 88px; height: 88px;" class="rounded-circle object-fit: cover;" >
                                                @else
                                                    <img src="{{ asset('assets/img/team/user_profile.png') }}" alt="Default Image" style="width: 80px; height: auto;">
                                                @endif
                                            </div>
                                            <div class="profile_image_content">
                                                <h4>Profile Photo</h4>
                                                <p>Click through the menu tabs at left hand side to manage your account details</p>
                                            </div>
                                        </div>
                                        <div class="image_upload_button">
                                            <button data-bs-toggle="modal" data-bs-target="#imageModal" type="button" class="theme_border_btns">Change profile photo</button>
                                        </div>

                                    </div>
                                    <div class="dashboard_body">
                                        <form method="post" action="{{ url('/user/update-profile') }}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row">
                                            <div class="col-lg-6  col-12">
                                                <div class="profile_input_item">
                                                    <label for="first_name">First name</label>
                                                    <div class="input_item">
                                                        <input type="text" name="name"
                                                        value="{{ $user_details?->name }}" placeholder="First Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6  col-12">
                                                <div class="profile_input_item">
                                                    <label for="first_name">Last name</label>
                                                    <div class="input_item">
                                                        <input type="text" name="other_name" value="{{ $user_details?->lname }}" placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="first_name">Email address</label>
                                                    <div class="input_item">
                                                        <input type="text" name="email"
                                                        value="{{ $user_details?->email }}" placeholder="Email address" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="Occupation">Occupation</label>
                                                    <div class="input_item">
                                                        <input type="text" name="occupation"
                                                        value="{{ $user_details?->user_occupation }}" name="Occupation">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Company</label>
                                                    <div class="input_item">
                                                        <input type="text" value="{{ $user_details?->user_company }}" name="company">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Biography</label>
                                                    <div class="input_item">
                                                        <textarea name="bio" id="">
                                                            {{$user_details?->user_biography}}
                                                        </textarea>
                                                        <span>1500 characters remaining</span>
                                                    </div>
                                                <div class="col-lg-12">
                                                    <div class="submition_btn text-right">
                                                        <button class="copy_button_link" type="submit">Update Profile</button>
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="banner" class="tab-content">
                            <div class="dash_board_card">
                                <form method="post" action="{{ url('/user/update-banner') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header">
                                        <h4>
                                            Banner
                                        </h4>
                                        <p>
                                            Upload a banner, this improves the appearance of your profile
                                        </p>
                                    </div>
                                    <div class="file_upload_areas">
                                        <div class="file_upload_area">
                                            <input type="file" name="banner_image" id="imageInput">
                                        </div>
                                            @if(!empty($user_details?->user_profile_banner) && file_exists(public_path('profile_images/' . $user_details?->user_profile_banner)))
                                            <img src="{{ asset('profile_images/' . $user_details?->user_profile_banner) }}" alt="banner Image" style="max-width: 90%; height: auto; border-radius: 12px" class="object-fit: cover;" >
                                            @else
                                                <div class="upload_of_content">
                                                    <div class="inner_upload_of_content">
                                                        <div class="upload_icon">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                                                    <path d="M4.66675 17.7384V22.0413C4.66675 22.6934 4.91258 23.3187 5.35017 23.7798C5.78775 24.241 6.38124 24.5 7.00008 24.5H21.0001C21.6189 24.5 22.2124 24.241 22.65 23.7798C23.0876 23.3187 23.3334 22.6933 23.3334 22.0412V17.7384M14.0009 17.4329L14.0009 3.5M14.0009 3.5L8.66762 8.82371M14.0009 3.5L19.3343 8.82371" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  </svg>
                                                            </span>
                                                        </div>
                                                        <h4>Click to upload or drag & drop</h4>
                                                        <p>
                                                            PNG, JPG, Jpeg and no larger than 2MB
                                                        </p>
                                                    </div>

                                                </div>
                                            @endif

                                    </div>
                                    <div class="col-lg-12">
                                        <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 90%; height: auto; margin-top: 10px; border-radius: 12px" />
                                    </div>

                                    <br/>
                                    <div class="col-lg-12">
                                        <div class="submition_btn text-right">
                                            <button class="copy_button_link" type="submit">Upload</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-------------------------------Social Links---------------------------------------->

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
                                        <form method="post" action="{{ url('/user/update-social') }}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="profile_input_item">
                                                    <label for="Linkedin">Linkedin</label>
                                                    <div class="input_item">
                                                        <input type="text" name="linkedin" value="{{ $social_details?->social_linkedin }}" placeholder="Linkedin URL">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="profile_input_item">
                                                    <label for="Occupation">Github</label>
                                                    <div class="input_item">
                                                        <input type="text" name="github"
                                                        value="{{ $social_details?->social_github }}" placeholder="Github URL">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Company</label>
                                                    <div class="input_item">
                                                        <input type="text" name="company"
                                                        value="{{ $social_details?->social_company }}" placeholder="Company">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Youtube</label>
                                                    <div class="input_item">
                                                        <input type="text" name="youtube"
                                                        value="{{ $social_details?->social_youtube }}" placeholder="Youtube URL">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="submition_btn text-right">
                                                    <button class="copy_button_link" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="work-experience" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header">
                                        <h4>
                                            Work Experience
                                        </h4>
                                        <p>
                                            Add your work history to your profile here
                                        </p>
                                    </div>
                                    <div class="dashboard_body">
                                        @foreach ($work_experience as $work_experiences)
                                        <div class="add_exp_btn">
                                            <div class="exp_items">
                                                <div class="exp_items_header d-flex align-items-center justify-content-space-between">
                                                    <h4>{{ $work_experiences?->job_title }}</h4>
                                                    <div class="tool_exp_areas">
                                                        <span class="edit_icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                                <path d="M13.8 20.0485H19.8M4.20007 20.0485L8.56606 19.1688C8.79784 19.1221 9.01065 19.008 9.17779 18.8407L18.9515 9.06168C19.4201 8.59283 19.4197 7.83284 18.9508 7.36438L16.8803 5.2963C16.4115 4.82804 15.6519 4.82836 15.1835 5.29702L5.40884 15.0771C5.24202 15.244 5.12812 15.4564 5.08138 15.6877L4.20007 20.0485Z" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                              </svg>
                                                        </span>
                                                        <span class="delete_icon" data-bs-toggle="modal" data-bs-target="#ask_delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                                <path d="M20.5 6.5H3.5M18.833 9L18.373 15.9C18.196 18.554 18.108 19.881 17.243 20.69C16.378 21.499 15.047 21.5 12.387 21.5H11.613C8.953 21.5 7.622 21.5 6.757 20.69C5.892 19.881 5.803 18.554 5.627 15.9L5.167 9" stroke="#202020" stroke-width="1.5" stroke-linecap="round"/>
                                                                <path d="M6.5 6.5H6.61C7.01245 6.48972 7.40242 6.35822 7.72892 6.12271C8.05543 5.8872 8.30325 5.55864 8.44 5.18L8.474 5.077L8.571 4.786C8.654 4.537 8.696 4.413 8.751 4.307C8.85921 4.09939 9.01451 3.91999 9.20448 3.78316C9.39444 3.64633 9.6138 3.55586 9.845 3.519C9.962 3.5 10.093 3.5 10.355 3.5H13.645C13.907 3.5 14.038 3.5 14.155 3.519C14.3862 3.55586 14.6056 3.64633 14.7955 3.78316C14.9855 3.91999 15.1408 4.09939 15.249 4.307C15.304 4.413 15.346 4.537 15.429 4.786L15.526 5.077C15.6527 5.49827 15.9148 5.86601 16.2717 6.12326C16.6285 6.38051 17.0603 6.51293 17.5 6.5" stroke="#202020" stroke-width="1.5"/>
                                                              </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="inner_wrapers_items">
                                                    <h4>{{ $work_experiences?->job_organization }}</h4>
                                                    <h4>
                                                        {{ \Carbon\Carbon::parse($work_experiences?->job_start_date)->format('d M, Y') }}
                                                            -
                                                            @if ($work_experiences?->job_end_date)
                                                                {{ \Carbon\Carbon::parse($work_experiences?->job_end_date)->format('d M, Y') }}
                                                            @else
                                                                Till date
                                                            @endif
                                                        </h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach


                                        <div class="add_work_exp_btn">
                                            <button data-bs-toggle="modal" data-bs-target="#work_experience_modal">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M6 12H18M12 18V6" stroke="#155CC8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                      </svg>
                                                </span>
                                                Add Work Experience
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                                    <h4>{{ $user_educations?->degree_name }}</h4>
                                                    <div class="tool_exp_areas">
                                                        <span class="edit_icon" data-bs-toggle="modal" data-bs-target="#education_modal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                                <path d="M13.8 20.0485H19.8M4.20007 20.0485L8.56606 19.1688C8.79784 19.1221 9.01065 19.008 9.17779 18.8407L18.9515 9.06168C19.4201 8.59283 19.4197 7.83284 18.9508 7.36438L16.8803 5.2963C16.4115 4.82804 15.6519 4.82836 15.1835 5.29702L5.40884 15.0771C5.24202 15.244 5.12812 15.4564 5.08138 15.6877L4.20007 20.0485Z" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                              </svg>
                                                        </span>
                                                        <span class="delete_icon" data-bs-toggle="modal" data-bs-target="#ask_delete_education">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                                <path d="M20.5 6.5H3.5M18.833 9L18.373 15.9C18.196 18.554 18.108 19.881 17.243 20.69C16.378 21.499 15.047 21.5 12.387 21.5H11.613C8.953 21.5 7.622 21.5 6.757 20.69C5.892 19.881 5.803 18.554 5.627 15.9L5.167 9" stroke="#202020" stroke-width="1.5" stroke-linecap="round"/>
                                                                <path d="M6.5 6.5H6.61C7.01245 6.48972 7.40242 6.35822 7.72892 6.12271C8.05543 5.8872 8.30325 5.55864 8.44 5.18L8.474 5.077L8.571 4.786C8.654 4.537 8.696 4.413 8.751 4.307C8.85921 4.09939 9.01451 3.91999 9.20448 3.78316C9.39444 3.64633 9.6138 3.55586 9.845 3.519C9.962 3.5 10.093 3.5 10.355 3.5H13.645C13.907 3.5 14.038 3.5 14.155 3.519C14.3862 3.55586 14.6056 3.64633 14.7955 3.78316C14.9855 3.91999 15.1408 4.09939 15.249 4.307C15.304 4.413 15.346 4.537 15.429 4.786L15.526 5.077C15.6527 5.49827 15.9148 5.86601 16.2717 6.12326C16.6285 6.38051 17.0603 6.51293 17.5 6.5" stroke="#202020" stroke-width="1.5"/>
                                                              </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="inner_wrapers_items">
                                                    {{-- <h4><strong>{{ $user_educations->degree_name }} </strong></h4> --}}
                                                    <h4>{{ $user_educations?->institution_name }}</h4>
                                                    <h4>{{ \Carbon\Carbon::parse($user_educations?->start_date)->format('d M, Y') }} - {{ \Carbon\Carbon::parse($user_educations?->end_date)->format('d M, Y') }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="add_work_exp_btn">
                                            <button data-bs-toggle="modal" data-bs-target="#education_modal">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M6 12H18M12 18V6" stroke="#155CC8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                      </svg>
                                                </span>
                                                Add education
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                        <form method="post" action="{{ url('/user/web-link') }}">
                                        <div class="row">

                                                @csrf
                                            <div class="col-lg-8 col-8  col-md-6 col-12">
                                                <div class="profile_input_item">

                                                    <div class="input_item">
                                                        <input type="text" name="web_link_name"
                                                        value="{{ $user_details?->web_link }}" placeholder="Enter your website URL ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="profile_input_item">

                                                    <button class="copy_button_link" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-----------------------------------------------------security---------------------------------------->
                        <div id="security" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header mb-4">
                                        <h4>
                                            Security
                                        </h4>
                                        <p>The security of your account is very important to us, regular update with strong password is highly recommend.</p>
                                    </div>

                                    <div class="dashboard_body">
                                        <form method="post" action="{{ url('/user/password_update') }}">
                                            @csrf
                                        <div class="row">

                                            <div class="col-lg-12    col-md-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="email_address">Email address</label>
                                                    <div class="input_item">
                                                        <input type="text" name="email_address" placeholder="Registered Email address">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="company">New password </label>
                                                    <div class="input_item">
                                                        <input type="password" name="new_password" placeholder="New password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="profile_input_item">
                                                    <label for="company">Confirm password</label>
                                                    <div class="input_item">
                                                        <input type="password" name="confirm_password" placeholder="Confirm password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="submition_btn text-right">
                                                    <button class="copy_button_link" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="preferences" class="tab-content">
                            <div class="dash_board_card">
                                <div class="inner_dashboard_section">
                                    <div class="dashboard_header mb-4">
                                        <h4>
                                            Preferences
                                        </h4>
                                        <p>Change your email address and password</p>
                                    </div>
                                    <form action="{{ url('/user/update_preferences') }}" method="post">
                                        @csrf
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
                                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="email_like" value="true" {{ $preference?->like_notify ? 'checked' : '' }} style="cursor: pointer;">
                                                        <label class="form-check-label" for="mySwitch">
                                                            <h4>Likes</h4>
                                                            <p>Get notified via email when someone likes your project</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="mySwitch2" name="email_comment" value="true" {{ $preference?->comment_notify ? 'checked' : '' }} style="cursor: pointer;">
                                                        <label class="form-check-label" for="mySwitch2">
                                                            <h4>Comments</h4>
                                                            <p>Get notified via email when someone comments on your project</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="mySwitch3" name="email_share" value="true" {{ $preference?->share_notify ? 'checked' : '' }} style="cursor: pointer;">
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
                                                        manage the visibility of your social links and other information on your profile
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="profile_input_item height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="c1s" name="show_link" value="true" {{ $preference?->show_social_link ? 'checked' : '' }} style="cursor: pointer;">
                                                        <label class="form-check-label" for="c1s">
                                                            <h4>Show social links</h4>
                                                            <p>If turn on, this will show your social links in your public profile</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="c2s" name="show_edu" value="true" {{ $preference?->show_education ? 'checked' : '' }} style="cursor: pointer;">
                                                        <label class="form-check-label" for="c2s">
                                                            <h4>Show education</h4>
                                                            <p>When turn on, it will display your education in your public profile</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="c3s" name="show_work_exp" value="true" {{ $preference?->show_work_experience ? 'checked' : '' }} style="cursor: pointer;">
                                                        <label class="form-check-label" for="c3s">
                                                            <h4>Show work experience</h4>
                                                            <p>If turn on, it will show your work experience in public profile</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="profile_input_item  height_auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="c4s" name="show_other" value="true" {{ $preference?->show_other_link ? 'checked' : '' }} style="cursor: pointer;">
                                                        <label class="form-check-label" for="c4s">
                                                            <h4>Show additional links</h4>
                                                            <p>When turn on, this will display other links in your public profile</p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="submition_btn text-right">
                                            <button class="copy_button_link" type="submit">Save</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <!-------------------------------Upload profile image popup----------------------->
    <div class="modal" id="imageModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="corner-modal-header">
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post" action="{{ url('/user/update-photo') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="dashboard_body popup_body">
                    <h4>Upload profile photo</h4>
                <p>Photo must be PNG or JPG and it should not be larger than 5MB</p>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Job-title">Choose Photo</label>
                                <div class="input_item">
                                    <input type="file" name="image" placeholder="select photo">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="submition_btn text-right">
                                <button class="copy_button_link" type="submit">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
          </div>
        </div>
    </div>
    <!-------------------------------popup_section----------------------->
    <div class="modal" id="work_experience_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="corner-modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="dashboard_body popup_body">
                    <p>
                        Add your work experience to your profile here</p>
                        @php
                            $today = date('Y-m-d');
                        @endphp
                    <div class="row">
                        <form method="post" action="{{ url('/user/work-experience') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Job-title">Job title</label>
                                <div class="input_item">
                                    <input type="text" name="Job_title" placeholder="Ex. Data scientist">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Company/Organization">Company/Organization</label>
                                <div class="input_item">
                                    <input type="text" name="job_company">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  col-md-6 col-12">
                            <div class="profile_input_item">
                                <label for="first_name">Start date</label>
                                <div class="input_item">
                                    <input type="date" name="job_date_start" max="{{ $today }}" placeholder="DD/MM/YY">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6   col-md-6 col-12">
                            <div class="profile_input_item">
                                <label for="first_name">End date</label>
                                <div class="input_item">
                                    <input type="date" name="job_date_end" id="job_date_end" max="{{ $today }}" placeholder="DD/MM/YY">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12  col-12">
                            <div class="custom_check_box">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="job_current" name="job_current" value="0" >
                                    <label class="form-check-label">I currently work here</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="submition_btn ">
                                <button class="copy_button_link" type="submit">Add work experience</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

          </div>
        </div>
    </div>
<!-----------------------Delete popup sections------------------>
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
                    <p>
                        Add your education qualification to your profile here</p>
                        @php
                            $today = date('Y-m-d');
                        @endphp
                    <div class="row">
                        <form method="post" action="{{ url('/user/add-education') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Job-title">Degree</label>
                                <div class="input_item">
                                    <input type="text" name="edu_degree" placeholder="Ex. BSC, Computer Science">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-12">
                            <div class="profile_input_item">
                                <label for="Institution">Institution</label>
                                <div class="input_item">
                                    <input type="text" name="edu_institution" placeholder="Ex. University of London">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  col-md-6 col-12">
                            <div class="profile_input_item">
                                <label for="first_name">Start date</label>
                                <div class="input_item">
                                    <input type="date" name="edu_start_date" id="edu_start_date" max="{{ $today }}" placeholder="DD/MM/YY">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6   col-md-6 col-12">
                            <div class="profile_input_item">
                                <label for="first_name">End date</label>
                                <div class="input_item">
                                    <input type="date" name="edu_end_date" max="{{ $today }}" id="edu_end_date" placeholder="DD/MM/YY">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="submition_btn ">
                                <button class="copy_button_link" type="submit">Add education</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

          </div>
        </div>
    </div>
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

    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('imagePreview');
            const fileInput = event.target;
            const file = fileInput.files[0];

            if (file) {
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                const maxSize = 5 * 1024 * 1024; // 5MB in bytes

                if (!allowedTypes.includes(file.type)) {
                    alert('Only JPG, JPEG, and PNG files are allowed.');
                    fileInput.value = '';
                    imagePreview.style.display = 'none';
                    return;
                }

                if (file.size > maxSize) {
                    alert('Project image size should not exceed 5MB.');
                    fileInput.value = '';
                    imagePreview.style.display = 'none';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkbox = document.getElementById('job_current');
            const endDate = document.getElementById('job_date_end');

            function toggleEndDate() {
                endDate.disabled = checkbox.checked;
                if (checkbox.checked) {
                    endDate.value = '';
                }
            }

            checkbox.addEventListener('change', toggleEndDate);
            toggleEndDate();
        });

    </script>
</body>
</html>
