
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->

    <h1 class="h3 mb-0 text-gray-800 mr-3 hidden_onMobile">Dashboard</h1> hello, &nbsp;<b>{{ ' '.$user_details->name }}</b>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                aria-expanded="false">
                <i class="fa fa-question-circle fa-2x" aria-hidden="true"></i>
                <!-- Counter - Alerts -->
                {{-- <span class="badge badge-danger badge-counter">3+</span> --}}
            </a>
            <!-- Dropdown - Alerts -->

        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(!empty($user_details->profile_url) && file_exists(public_path('profile_images/' . $user_details->profile_url)))
                <img src="{{ asset('profile_images/' . $user_details->profile_url) }}" alt="Profile Image" class="img-profile rounded-circle" >
            @else
            <img class="img-profile rounded-circle"
            src="{{asset('assets/img/team/user_profile.png')}}">
            @endif


                <span class="mr-2 d-none d-lg-inline text-gray-600 small ml-3 mr-2">{{ $user_details->name.' '.$user_details->lname }} <i class="fa fa-chevron-down" aria-hidden="true"></i></span>

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/user/profile">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="/user/portfolio">
                    <i class="fa fa-suitcase fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>
                    My Portfolio
                </a>
                <a class="dropdown-item" href="/user/new-project">
                    <i class="fa fa-suitcase fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>
                    Create Portfolio
                </a>
                <a class="dropdown-item" href="/user/edit-profile">
                    <i class="fa fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password </a>
                </a>

                <a class="dropdown-item" href="#">
                    <i class="far fa-trash-alt fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>
                    Delete Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
