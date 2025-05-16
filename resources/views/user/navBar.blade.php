<div class="rts__menu d-flex gap-5 align-items-center">
    <div class="navigation d-none d-lg-block">
        <nav class="navigation__menu" id="offcanvas__menu">
            <ul class="list-unstyled">
                <li class="navigation__menu--item has-child has-arrow">
                    <a href="#" class="navigation__menu--item__link">Discover</a>
                    <ul class="submenu sub__style" role="menu">
                        <li role="menuitem"><a href="#">Discover !</a></li>
                        <li role="menuitem"><a href="#">Discover 2</a></li>
                        <li role="menuitem"><a href="/profile">Project Profile</a></li>
                        <li role="menuitem"><a href="/project">Project Details</a></li>
                    </ul>
                </li>

                <li class="navigation__menu--item">
                    <a href="#" class="navigation__menu--item__link">Showcase</a>

                </li>

                <li class="navigation__menu--item">
                    <a href="/testimonial" class="navigation__menu--item__link">Testimonials</a>

                </li>

                <li class="navigation__menu--item">
                    <a href="#" class="navigation__menu--item__link">Blog</a>

                </li>
            </ul>
        </nav>
    </div>

        @if (Route::has('login'))

        @auth
        @if(Auth::user()->user_type === 'ADM')

        <h5>Hi Admin <a href="{{route('admin.dashboard')}}">Dashboard</a><br/>
            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form method="POST" id="logout-form" action="{{route('logout')}}">
                @csrf
            </form>
        </h5>
        @else
            <form method="POST" id="logout-form" action="{{route('logout')}}">
                @csrf
            </form>
            <div class="rts__menu d-flex gap-5 gap-lg-4 gap-xl-5 align-items-center">
                <div class="header__right__btn d-flex align-items-center gap-30">
                    <div class="notification__btn">
                        <div class="notification__icon dropdown" data-bs-toggle="dropdown">
                            <svg width="23" height="27" viewBox="0 0 23 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.4936 16.8814L20.125 14.5128V11.375C20.1223 9.20661 19.3156 7.11624 17.8611 5.50811C16.4065 3.89998 14.4072 2.88832 12.25 2.66875V0.875H10.5V2.66875C8.34275 2.88832 6.34354 3.89998 4.88895 5.50811C3.43436 7.11624 2.62771 9.20661 2.625 11.375V14.5128L0.256375 16.8814C0.0922693 17.0454 4.95577e-05 17.268 0 17.5V20.125C0 20.3571 0.0921872 20.5796 0.256282 20.7437C0.420376 20.9078 0.642936 21 0.875 21H7V21.6799C6.98058 22.79 7.3717 23.8683 8.09836 24.7078C8.82501 25.5473 9.83603 26.089 10.9375 26.229C11.5458 26.2893 12.16 26.2217 12.7405 26.0304C13.3211 25.8391 13.8552 25.5284 14.3085 25.1183C14.7617 24.7082 15.1242 24.2078 15.3724 23.6492C15.6207 23.0906 15.7493 22.4863 15.75 21.875V21H21.875C22.1071 21 22.3296 20.9078 22.4937 20.7437C22.6578 20.5796 22.75 20.3571 22.75 20.125V17.5C22.75 17.268 22.6577 17.0454 22.4936 16.8814ZM14 21.875C14 22.5712 13.7234 23.2389 13.2312 23.7312C12.7389 24.2234 12.0712 24.5 11.375 24.5C10.6788 24.5 10.0111 24.2234 9.51884 23.7312C9.02656 23.2389 8.75 22.5712 8.75 21.875V21H14V21.875ZM21 19.25H1.75V17.8623L4.11862 15.4936C4.28273 15.3296 4.37495 15.107 4.375 14.875V11.375C4.375 9.51849 5.1125 7.73801 6.42525 6.42525C7.73801 5.1125 9.51848 4.375 11.375 4.375C13.2315 4.375 15.012 5.1125 16.3247 6.42525C17.6375 7.73801 18.375 9.51849 18.375 11.375V14.875C18.375 15.107 18.4673 15.3296 18.6314 15.4936L21 17.8623V19.25Z" fill="#fff"/>
                            </svg>
                            <span class="notification__count">2</span>
                        </div>

                            @include('user.recentNotification')
                    </div>
                    <div class="user__info ">
                        <div class="d-flex gap-3 align-items-center pointer" data-bs-toggle="dropdown">
                            <div class="user__image if__employer">
                                <i class="bi bi-person-circle" style="font-size: 2rem; color: #7d8087;"></i>
                            </div>
                            <div class="user__name d-none d-xl-block">
                                <span>{{Auth::user()->name}}</span>
                            </div>
                            <div class="dropdown__option d-none d-xl-block">
                                <div class="dropdown__icon " ><i class="fa-light fa-chevron-down"></i></div>
                            </div>
                        </div>
                        <ul class="rts__dropdown dropdown-menu top-25">
                            <li><a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">My Projects</a></li>
                            <li><a class="dropdown-item" href="#">Message</a></li>
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </h3>
        @endif

        @else
        <div class="header__right__btn d-flex gap-3">
            <a href="/user-login" class="small__btn he-3 d-none d-sm-flex font-xs text-white"
                aria-label="Login Button">Log In</a>

            <a href="/user-register" class="small__btn he-4 d-none d-sm-flex fill__btn rounded-5 font-xs gradient_btn" aria-label="Join clap academy">Sign Up</a>

            <button class="d-md-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas" aria-controls="offcanvas"><i
                    class="fa-sharp fa-regular fa-bars text-white"></i>
            </button>
        </div>

        {{-- <div class="header__right__btn d-flex gap-3">
            <a href="#" class="small__btn he-3 d-none d-sm-flex no__fill__btn border-6 font-xs"
                aria-label="Login Button" data-bs-toggle="modal" data-bs-target="#loginModal">

                Sign In</a>
            <a href="#" class="small__btn he-3 d-none d-sm-flex fill__btn border-6 font-xs gradient_btn"
                aria-label="Job Posting Button" data-bs-target="#signupModal" data-bs-toggle="modal">Sign Up</a>
            <button class="d-md-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas" aria-controls="offcanvas"><i
                    class="fa-sharp fa-regular fa-bars"></i></button>
        </div> --}}
        @endif

    @endif

</div>
