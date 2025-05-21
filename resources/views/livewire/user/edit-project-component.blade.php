    <!-- Sidebar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End of Sidebar -->

    @include('userDash_template.dash_siderBar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
                @include('userDash_template.dash_topBar')
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="page_dashboard">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-xl-3 col-md-4 col-12">
                            <div class="side_ber_section">
                                <div class="side_ber_inner_section">
                                    <div class="back_page">
                                        <a href="/user/portfolio">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M9.57 5.92969L3.5 11.9997L9.57 18.0697M20.5 11.9997H3.67" stroke="#202020" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                  </svg>
                                            </span>
                                            Back to Projects
                                        </a>
                                    </div>

                                    <div class="sideber_item_body">
                                        <ul class="tabs">
                                            <li class="tab active" data-tab="basic-info">
                                                <a href="javascript:void(0)">
                                                    <span class="controll_icon mr-4">
                                                        <i class="fa-solid fa-folder"></i>
                                                    </span>
                                                    Project Details
                                                </a>
                                            </li>
                                            <li class="tab " data-tab="tools-info">
                                                <a href="javascript:void(0)">
                                                    <span class="controll_icon mr-4">
                                                        <i class="fa-solid fa-shield"></i>
                                                    </span>
                                                    Tools & Data
                                                </a>
                                            </li>
                                            <li class="tab" data-tab="media">
                                                <a href="javascript:void(0)">
                                                    <span class="controll_icon  mr-4">
                                                        <i class="fa-solid fa-tools"></i>
                                                    </span>
                                                    Embed Media
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <br/>
                                    <div class="siedeber_item">
                                        <div class="side_ber_item_header">
                                           <div class="com_bine">
                                            <span class="controll_icon">
                                                <i class="fa-solid fa-shield"></i>
                                            </span>
                                            <span class="controll_text">
                                                {{ ucfirst($project_details->project_status) }}
                                            </span>
                                           </div>
                                        </div>

                                    </div>

                                    <div class="sideber_item_body">
                                        <div class="radius_button red_button">
                                           <button data-bs-toggle="modal" data-bs-target="#ask_delete_project">Delete project</button>
                                       </div>
                                   </div>

                                </div>
                            </div>
                        </div>
                        {{-- Basic Information sections --}}
                        <div class="col-lg-8 col-xl-9 col-md-8 col-12">
                            <div class="content">
                                <div id="basic-info" class="tab-content active">
                                    <div class="dash_board_card">
                                        <div class="inner_dashboard_section">
                                            <div class="dashboard_header">
                                                <h4>
                                                    Edit Project Information
                                                </h4>
                                            </div>

                                            <div class="dashboard_body">
                                                <form action="{{ url('/user/update-project') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
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
                                                    @if(Session::has('message'))
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert" role="alert">
                                                            {{Session::get('message')}}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif
                                                    @if(Session('error'))
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                                                            {{Session('error')}}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif

                                                  <div class="row">
                                                      <div class="col-lg-12 col-12">
                                                        <div class="profile_input_item">
                                                            <label for="first_name">Project title</label>
                                                            <div class="input_item">
                                                                <input type="text" name="project_title" value="{{old('project_title', $project_details->project_title) }}" placeholder=" Project Title" wire:model='project_title'>
                                                                <span>150 characters remaining</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="project_id" value="{{ old('id', $project_details->id)  }}" placeholder=" Project ID">

                                                    <div class="col-lg-12 col-12">
                                                        <div class="profile_input_item">
                                                            <label for="company">Project excerpt</label>
                                                            <div class="input_item height-100">
                                                                <textarea name="project_concept" id="" placeholder="Project Concept">{{ old('project_concept', $project_details->project_concept) }}</textarea>
                                                                <span>150 characters remaining</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-12">
                                                        <div class="profile_input_item">
                                                            <label for="company">Project description</label>
                                                            <div class="input_item">
                                                                <textarea name="project_description" id="" placeholder="Project Description">{{old('project_description', $project_details->project_description ) }}</textarea>
                                                                <span>2000 characters remaining</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-12">
                                                        <div class="profile_input_item">
                                                            <label for="company">Project image</label>
                                                            <div class="file_upload_areas mt-0">
                                                                <div class="file_upload_area">
                                                                    <input type="file" name="image" id="imageInput">
                                                                </div>
                                                                <div class="upload_of_content">
                                                                    @if(!empty($project_details->project_image) && file_exists(public_path('project_images/' . $project_details->project_image)))
                                                                    <img src="{{ asset('project_images/' . $project_details->project_image) }}" alt="project Image" style="max-width: 100%; height: 150px; border-radius: 12px">
                                                                @else
                                                                <div class="inner_upload_of_content">
                                                                    <div class="upload_icon">
                                                                        <span>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                                                                <path d="M4.66675 17.7384V22.0413C4.66675 22.6934 4.91258 23.3187 5.35017 23.7798C5.78775 24.241 6.38124 24.5 7.00008 24.5H21.0001C21.6189 24.5 22.2124 24.241 22.65 23.7798C23.0876 23.3187 23.3334 22.6933 23.3334 22.0412V17.7384M14.0009 17.4329L14.0009 3.5M14.0009 3.5L8.66762 8.82371M14.0009 3.5L19.3343 8.82371" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                              </svg>
                                                                        </span>
                                                                    </div>
                                                                    <h4>Click to upload or drag &amp; drop &nbsp;&nbsp;</h4>
                                                                    <p>
                                                                        PNG, JPG, Jpeg and no larger than 5MB
                                                                    </p>
                                                                </div>
                                                                @endif

                                                                </div>

                                                            </div>
                                                            <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 40%; height: 400px; margin-top: 10px;" />
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

                                {{-- Project tools section here --}}
                                <div id="tools-info" class="tab-content">
                                    <form method="post" action="{{ url('/user/updateProject-tools') }}">
                                        @csrf
                                    <div class="dash_board_card">
                                        <div class="inner_dashboard_section">
                                            <div class="dashboard_header">
                                                <h4>
                                                    Project Tools & Source Data
                                                </h4>
                                            </div>
                                                    {{-- Error message for checkboxes --}}
                                                    @if ($errors->any())
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif

                                                    @if(Session::has('message'))
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert" role="alert">
                                                            {{Session::get('message')}}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif

                                            <div class="project_tools_sections">

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="project_label_conts">
                                                            <h4>Project Tools</h4>
                                                            <p>Which tools or languages were used in this project</p>
                                                        </div>
                                                    </div>

                                                    {{-- Error message for input field --}}
                                                    @error('tool_data')
                                                        <div style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                    @php

                                                        $selectedTools = collect($tools)->pluck('project_tools')->toArray();

                                                        $dataUrlSource = $tools->firstWhere('data_url_source', '!=', null)->data_url_source ?? '';
                                                    @endphp
                                                    <div class="col-lg-4">

                                                        <input type="hidden" name="project_id" value="{{ old('id', $project_details->id)  }}" placeholder=" Project ID">

                                                        <div class="skill_tolls">
                                                            <div class="skill_tool_items">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="check1" name="tool_ms_excel" value="ms_excel" {{ in_array('ms_excel', $selectedTools) ? 'checked' : '' }} style="cursor: pointer;" >
                                                                    <label class="form-check-label">
                                                                        <span class="tool_icons">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <g clip-path="url(#clip0_488_4176)">
                                                                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M21.5858 3.30197H13.9882V1.51172L1.5 3.43922V20.3345L13.9882 22.4855V19.832H21.5858C21.8159 19.844 22.0415 19.7642 22.2129 19.6101C22.3844 19.456 22.4876 19.2402 22.5 19.01V4.12322C22.4874 3.89317 22.3841 3.67752 22.2127 3.52356C22.0413 3.3696 21.8158 3.28991 21.5858 3.30197ZM21.7057 19.1465H13.9628L13.95 17.7297H15.8153V16.0797H13.9357L13.9268 15.1047H15.8153V13.4547H13.9125L13.9035 12.4797H15.8153V10.8297H13.8975V9.85472H15.8153V8.20472H13.8975V7.22972H15.8153V5.57972H13.8975V4.07972H21.7057V19.1465Z" fill="#202020"/>
                                                                                  <path d="M19.5 -12H22.7422V-10.35H19.5V-12ZM19.5 -9.37425H22.7422V-7.72425H19.5V-9.37425ZM19.5 -6.7485H22.7422V-5.0985H19.5V-6.7485ZM19.5 -4.12275H22.7422V-2.47275H19.5V-4.12275ZM19.5 -1.497H22.7422V0.152999H19.5V-1.497Z" fill="#202020"/>
                                                                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.76007 8.00628L6.36957 7.91403L7.38132 10.6958L8.57682 7.79928L10.1863 7.70703L8.23182 11.6565L10.1863 15.6158L8.48457 15.501L7.33557 12.483L6.18582 15.3863L4.62207 15.2483L6.43857 11.751L4.76007 8.00628Z" fill="white"/>
                                                                                </g>
                                                                                <defs>
                                                                                  <clipPath id="clip0_488_4176">
                                                                                    <rect width="24" height="24" fill="white"/>
                                                                                  </clipPath>
                                                                                </defs>
                                                                              </svg>
                                                                        </span>
                                                                        <span class="tool_check_label">
                                                                            Microsoft Excel
                                                                        </span>
                                                                    </label>
                                                                  </div>
                                                            </div>
                                                            <div class="skill_tool_items">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="check2" name="tool_python" value="python" {{ in_array('python', $selectedTools) ? 'checked' : '' }} style="cursor: pointer;">
                                                                    <label class="form-check-label">
                                                                        <span class="tool_icons">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.29 20.3541C13.29 20.8263 13.6728 21.2091 14.145 21.2091C14.6172 21.2091 15 20.8263 15 20.3541C15 19.8819 14.6172 19.4991 14.145 19.4991C13.6728 19.4991 13.29 19.8819 13.29 20.3541ZM9 3.64406C9 4.11626 9.3828 4.49906 9.855 4.49906C10.3272 4.49906 10.71 4.11626 10.71 3.64406C10.71 3.17186 10.3272 2.78906 9.855 2.78906C9.3828 2.78906 9 3.17186 9 3.64406Z" fill="#202020"/>
                                                                                <path d="M18.1786 5.57142V5.82142H18.4286H21.2857C22.6448 5.82142 23.75 6.92665 23.75 8.2857V15.7143C23.75 17.0734 22.6448 18.1786 21.2857 18.1786H18.4286H18.1786V18.4286V21.2857C18.1786 22.6448 17.0734 23.75 15.7143 23.75H8.2857C6.92665 23.75 5.82142 22.6448 5.82142 21.2857V18.4286V18.1786H5.57142H2.71428C1.3552 18.1786 0.25 17.0734 0.25 15.7143V8.2857C0.25 6.92665 1.3552 5.82142 2.71428 5.82142H5.57142H5.82142V5.57142V2.71428C5.82142 1.3552 6.92665 0.25 8.2857 0.25H15.7143C17.0734 0.25 18.1786 1.3552 18.1786 2.71428V5.57142ZM7.03574 5.57142V5.82142H7.28574H11.0714C11.4076 5.82142 11.6786 6.09237 11.6786 6.42858C11.6786 6.76478 11.4077 7.03571 11.0714 7.03571H2.71428C2.02477 7.03571 1.46429 7.59623 1.46429 8.2857V15.7143C1.46429 16.4038 2.02481 16.9643 2.71428 16.9643H5.57142H5.82142V16.7143V13.5914C5.82142 12.3807 6.80684 11.3929 8.01999 11.3929H15.98C16.5238 11.3929 16.9643 10.9523 16.9643 10.4086V2.71428C16.9643 2.02477 16.4038 1.46429 15.7143 1.46429H8.2857C7.59622 1.46429 7.03574 2.02482 7.03574 2.71428V5.57142ZM16.9643 18.4286V18.1786H16.7143H12.9286C12.5924 18.1786 12.3214 17.9076 12.3214 17.5714C12.3214 17.2352 12.5923 16.9643 12.9286 16.9643H21.2857C21.9752 16.9643 22.5357 16.4038 22.5357 15.7143V8.2857C22.5357 7.59623 21.9752 7.03571 21.2857 7.03571H18.4286H18.1786V7.28571V10.4086C18.1786 11.6193 17.1932 12.6071 15.98 12.6071H8.01999C7.47622 12.6071 7.03571 13.0477 7.03571 13.5914V21.2857C7.03571 21.9752 7.59623 22.5357 8.2857 22.5357H15.7143C16.4038 22.5357 16.9643 21.9752 16.9643 21.2857V18.4286Z" fill="#202020" stroke="white" stroke-width="0.5"/>
                                                                              </svg>
                                                                        </span>
                                                                        <span class="tool_check_label">
                                                                            Python
                                                                        </span>
                                                                    </label>
                                                                  </div>
                                                            </div>
                                                            <div class="skill_tool_items">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="check3" name="tool_sql" value="sql" {{ in_array('sql', $selectedTools) ? 'checked' : '' }} style="cursor: pointer;">
                                                                    <label class="form-check-label">
                                                                        <span class="tool_icons">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M3.61816 18.3135V5.677M20.3822 9.937C20.3822 11.597 16.6582 12.93 12.0002 12.93C7.34216 12.93 3.61816 11.6015 3.61816 9.9415M20.3822 14.0635C20.3822 15.7235 16.6587 17.052 12.0002 17.052C7.34166 17.052 3.61816 15.724 3.61816 14.0635M3.61866 18.3185C3.61866 19.917 7.34166 21.25 12.0002 21.25C16.6587 21.25 20.3822 19.917 20.3822 18.3185V5.677M20.3822 5.6815C20.3822 7.3415 16.6582 8.67 12.0002 8.67C7.34216 8.67 3.61816 7.342 3.61816 5.6815C3.75116 4.083 7.41316 2.75 11.9337 2.75C16.5257 2.75 20.2492 4.078 20.3822 5.6815Z" stroke="#202020" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                              </svg>
                                                                        </span>
                                                                        <span class="tool_check_label">
                                                                            SQL
                                                                        </span>
                                                                    </label>
                                                                  </div>
                                                            </div>
                                                            <div class="skill_tool_items">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="check4" name="tool_apache" value="apache" {{ in_array('apache', $selectedTools) ? 'checked' : '' }} style="cursor: pointer;">
                                                                    <label class="form-check-label">
                                                                        <span class="tool_icons">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <g clip-path="url(#clip0_488_4197)">
                                                                                  <path d="M10.8121 0C10.3871 0.013 9.96707 0.215 9.61607 0.605C9.42302 0.824745 9.25746 1.0672 9.12307 1.327C8.76807 1.994 8.69807 2.742 8.56707 3.47C8.31995 4.83142 8.07795 6.19376 7.84107 7.557C7.81407 7.717 7.74507 7.784 7.59707 7.83C5.83007 8.386 4.06007 8.94 2.30007 9.514C1.90943 9.63643 1.53529 9.80637 1.18607 10.02C0.144073 10.685 -0.00992712 11.773 0.771073 12.73C1.11707 13.152 1.56107 13.445 2.05507 13.666C3.15507 14.156 4.25707 14.642 5.35507 15.136C5.37407 15.146 5.39107 15.149 5.40807 15.155H5.40407L6.71007 15.69V15.763C6.51007 17.793 6.32007 19.826 6.13007 21.858C6.09007 22.277 6.11807 22.689 6.26407 23.088C6.58107 23.958 7.32907 24.236 8.14507 23.789C8.51707 23.585 8.81107 23.292 9.08207 22.971C10.4541 21.348 11.8281 19.727 13.1951 18.099C13.3061 17.966 13.4001 17.949 13.5581 18.001L14.6031 18.348H14.6041C14.6241 18.3593 14.6484 18.3693 14.6771 18.378L14.8191 18.42C16.0671 18.836 17.4991 19.195 18.7481 19.61C19.1481 19.742 19.3701 19.774 19.7931 19.708C20.1041 19.66 20.3851 19.646 20.6211 19.472C21.2231 19.142 21.6161 18.515 21.6091 17.79C21.6041 17.363 21.4551 16.977 21.2591 16.604C20.4391 15.048 19.6221 13.491 18.7981 11.938C18.7201 11.79 18.7221 11.695 18.8351 11.563C20.2161 9.948 21.5911 8.327 22.9681 6.708C23.2401 6.388 23.4811 6.05 23.6211 5.65C23.9291 4.772 23.5311 4.08 22.6211 3.909C22.2094 3.83965 21.7874 3.86322 21.3861 3.978C19.4121 4.499 17.4391 5.019 15.4681 5.548C15.2931 5.595 15.2081 5.563 15.1131 5.404C14.315 4.05932 13.508 2.71996 12.6921 1.386C12.5085 1.07859 12.2897 0.793662 12.0401 0.537C11.6691 0.167 11.2381 -0.012 10.8131 0.001L10.8121 0ZM10.9841 3.703C11.063 3.75724 11.1278 3.82959 11.1731 3.914C12.0444 5.35933 12.9141 6.80533 13.7821 8.252C13.8521 8.37 13.9171 8.412 14.0591 8.373C15.5841 7.963 17.1111 7.56 18.6381 7.156C19.0047 7.05867 19.3724 6.96233 19.7411 6.867C19.7274 6.94182 19.6927 7.0112 19.6411 7.067C18.3821 8.547 17.1251 10.029 15.8621 11.505C15.7521 11.635 15.7421 11.725 15.8221 11.875C16.7591 13.678 17.5901 15.184 18.3201 16.635L14.6241 15.616L13.0091 15.077C12.8461 15.022 12.7591 15.047 12.6491 15.177C11.4011 16.665 10.1451 18.147 8.89007 19.631C8.84381 19.6912 8.78138 19.737 8.71007 19.763L8.81407 18.627C8.96207 17.055 9.11241 15.483 9.26507 13.911C9.23507 13.593 9.38207 13.506 8.94307 13.366C7.45007 12.773 5.59707 12.045 4.12707 11.461C4.19563 11.3984 4.27778 11.3525 4.36707 11.327C6.16374 10.7563 7.96174 10.188 9.76107 9.622C9.88807 9.582 9.96007 9.53 9.97207 9.389C9.98507 9.241 10.0221 9.095 10.0481 8.948C10.2894 7.58467 10.5314 6.222 10.7741 4.86L10.9841 3.703Z" fill="#202020"/>
                                                                                </g>
                                                                                <defs>
                                                                                  <clipPath id="clip0_488_4197">
                                                                                    <rect width="24" height="24" fill="white"/>
                                                                                  </clipPath>
                                                                                </defs>
                                                                              </svg>
                                                                        </span>
                                                                        <span class="tool_check_label">
                                                                            Apache Spark
                                                                        </span>
                                                                    </label>
                                                                  </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="skill_tolls">
                                                            <div class="skill_tool_items">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="check3" name="tool_tableau" value="tableau" {{ in_array('tableau', $selectedTools) ? 'checked' : '' }} style="cursor: pointer;">
                                                                    <label class="form-check-label">
                                                                        <span class="tool_icons">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                                <g clip-path="url(#clip0_488_4204)">
                                                                                  <path d="M9.71 0.148438V1.98406H8.07V2.46594H9.71V4.30156H10.2931V2.46594H11.9331V1.98406H10.2931V0.148438H9.71ZM14.7369 2.03344V4.73844H12.2725V5.50906H14.7369V8.16594H15.6062L15.6119 6.84781L15.6319 5.53594L16.8525 5.51594L18.0669 5.50906V4.73844H15.6062V2.03344H14.7369ZM4.3975 2.08156V4.74156H1.9075V5.50906H4.3975V8.16906H5.21812V5.50906H7.7275V4.73844H5.21812V2.08156H4.3975ZM9.46937 6.47344V9.46781H6.71625V10.4578H9.46937V13.4559H10.5375V10.4578H13.2944V9.46781H10.5375V6.47344H9.46937ZM17.5719 7.76469V9.61406H15.8919V10.2916H17.5719V12.1759H18.3113V10.2916H20.0006V9.61406H18.3113V7.76469H17.5719ZM1.64438 7.87219V9.68531H0V10.2028H1.64438V12.0328H2.20125V10.2028H3.86812V9.68531H2.175V7.87219H1.64438ZM14.7369 11.6391V14.3509H12.22V15.1228H14.7369V17.8009H15.6287V15.1228H18.1156V14.3509H15.6287V11.6391H14.7369ZM4.34938 11.6459V14.3509H1.885V15.1228H4.34938V17.7822H5.26688V15.1228H7.7275V14.3509H5.26688V11.6428H4.80875L4.34938 11.6459ZM9.6125 15.4609V17.2966H7.97188V17.9697H9.6125V19.8547H10.3875L10.3975 18.9241L10.41 17.9697H12.0544V17.2966H10.3875V15.4609H9.6125Z" fill="#202020"/>
                                                                                </g>
                                                                                <defs>
                                                                                  <clipPath id="clip0_488_4204">
                                                                                    <rect width="20" height="20" fill="white"/>
                                                                                  </clipPath>
                                                                                </defs>
                                                                              </svg>
                                                                        </span>
                                                                        <span class="tool_check_label">
                                                                            Tableau
                                                                        </span>
                                                                    </label>
                                                                  </div>
                                                            </div>
                                                            <div class="skill_tool_items">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="check3" name="tool_power_bi" value="power bi" {{ in_array('power bi', $selectedTools) ? 'checked' : '' }} style="cursor: pointer;">
                                                                    <label class="form-check-label">
                                                                        <span class="tool_icons">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M13.4795 7.08622V3.32422C13.4795 3.059 13.5848 2.80465 13.7723 2.61711C13.9599 2.42958 14.2142 2.32422 14.4795 2.32422H19.2335C19.4987 2.32422 19.753 2.42958 19.9406 2.61711C20.1281 2.80465 20.2335 3.059 20.2335 3.32422V20.8242C20.2335 21.0894 20.1281 21.3438 19.9406 21.5313C19.753 21.7189 19.4987 21.8242 19.2335 21.8242H15.8385M5.68945 11.8062H10.4435C10.7087 11.8062 10.963 11.9116 11.1506 12.0991C11.3381 12.2866 11.4435 12.541 11.4435 12.8062V21.8242H5.68945C5.42424 21.8242 5.16988 21.7189 4.98235 21.5313C4.79481 21.3438 4.68945 21.0894 4.68945 20.8242V12.8062C4.68945 12.541 4.79481 12.2866 4.98235 12.0991C5.16988 11.9116 5.42424 11.8062 5.68945 11.8062Z" stroke="#202020" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M9.08496 11.8059V8.08594C9.08496 7.82072 9.19032 7.56637 9.37785 7.37883C9.56539 7.19129 9.81974 7.08594 10.085 7.08594H14.839C15.1042 7.08594 15.3585 7.19129 15.5461 7.37883C15.7336 7.56637 15.839 7.82072 15.839 8.08594V21.8239H11.444" stroke="#202020" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                              </svg>
                                                                        </span>
                                                                        <span class="tool_check_label">
                                                                            Power BI
                                                                        </span>
                                                                    </label>
                                                                  </div>
                                                            </div>

                                                            <div class="skill_tool_items">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="check5" name="tool_other" value="other" {{ in_array('other', $selectedTools) ? 'checked' : '' }} style="cursor: pointer;">
                                                                    <label class="form-check-label">

                                                                        <span class="tool_check_label">
                                                                            Other
                                                                        </span>
                                                                    </label>
                                                                  </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                               </div>
                                            <!----------------------external source------------>
                                            <div class="external_wrapers">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="project_label_conts">
                                                            <h4>External data source</h4>
                                                            <p>Include a link to raw source data.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="profile_input_item">
                                                            <label for="first_name">Data Source URL</label>
                                                            <div class="input_item">
                                                                <input type="text" name="tool_data_url"
                                                                value="{{ $dataUrlSource }}"
                                                                placeholder="https://data.com">
                                                            </div>
                                                        </div>
                                                    </div>
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

                                {{-- Embed Media Section Here --}}
                                <div id="media" class="tab-content">
                                    <div class="dash_board_card">
                                        <div class="inner_dashboard_section">
                                            <div class="dashboard_header">
                                                <h4>
                                                    Embed Media
                                                </h4>
                                                @if(Session::has('message'))
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert" role="alert">
                                                        {{Session::get('message')}}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    @endif

                                                    @if ($errors->any())
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif
                                            </div>

                                            <div class="dashboard_body mt-4">
                                            <form method="post" action="{{ url('/user/updateEmbed-media') }}">
                                                @csrf
                                            <input type="hidden" name="project_tag" value="{{ session('transaction_id') }}">

                                                <div class="row">
                                                    <input type="hidden" name="project_id" value="{{ old('id', $project_details->id)  }}" placeholder=" Project ID">

                                                    <div class="col-lg-12">
                                                        <div class="profile_input_item">
                                                            <label for="md_name">Media name</label>
                                                            <div class="input_item">
                                                                <input type="text" value="{{$embed_links->embed_media_name ?? 'N/A' }}" name="media_name" placeholder="Enter media name" class="mb-2">
                                                                <span class="">This is for all your embedded content</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="profile_input_item">
                                                            <label for="Occupation">Embed type</label>
                                                            <div class="input_item">
                                                                <select name="embed_type" id=""  class="form-select">
                                                                    <option value="{{ $embed_links->embed_media_type ?? ''}}">
                                                                        {{ $embed_links->embed_media_type ?? 'Choose type'}}
                                                                    </option>
                                                                    <option value="Power BI">Power BI</option>
                                                                    <option value="Tableau">Tableau</option>
                                                                    <option value="Youtube">Youtube</option>
                                                                    <option value="Jupyter">Jupyter Notebook</option>
                                                                    <option value="Vimeo">Vimeo</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="profile_input_item">
                                                            <label for="Occupation">Aspect Ratio</label>
                                                            <div class="input_item">
                                                                <select name="embed_ratio" id="" class="form-select">
                                                                    <option value="{{ $embed_links->embed_media_ratio ?? ''}}">
                                                                        {{ $embed_links->embed_media_ratio ?? 'Choopse Aspect Ratio'}}
                                                                    </option>
                                                                    <option value="Horizontal 1:1">Horizontal 1:1</option>
                                                                    <option value="Horizontal 2:1">Horizontal 2:1</option>
                                                                    <option value="Vertical 1:2">Vertical 1:2</option>
                                                                    <option value="Vertical 1:1">Vertical 1:1</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="submition_btn text-right">
                                                            <button type="submit" class="copy_button_link" type="submit">Update</button>
                                                        </div>
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
            </div>


            <div class="modal" id="ask_delete_project">
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
                                <form method="post" action="{{ url('/user/delete-project') }}">
                                    @csrf
                                <input type="hidden" name="project_id" value="{{ old('id', $project_details->id)  }}" placeholder=" Project ID">
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
                                        <h4>Delete Project</h4>
                                        <p>Are you sure you want to delete this Project? This action cannot be undone</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="submition_btn align-items-center btn_center">
                                        <button class="copy_button_link" type="button" class="btn-close" data-bs-dismiss="modal">No, Return</button>
                                        <button class="copy_button_link delete_buttons" type="submit">Yes, Delete</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                  </div>
                </div>
            </div>

            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
            @include('userDash_template.dash_footer')
        <!-- End of Footer -->
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
    </div>

    <!-- End of Content Wrapper -->
