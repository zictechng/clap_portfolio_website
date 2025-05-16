<header class="rts__section rts__dashboard__header position-fixed w-100 text-dark">
    <div class="container-fluid g-0">
        <div class="rts__menu__background mw-100 px-20 mobile__padding rounded-0"
            style="background-color: #fff; color:black">
            <div class="row">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="rts__logo">
                        <a href="/">
                            <img class="logo__image" src="{{asset('assets/img/logo/logo_black.png')}}" width="120"
                                height="30" alt="logo">
                        </a>
                    </div>
                    <div class="navigation d-none d-lg-block">
                        <nav class="navigation__menu" id="offcanvas__menu">
                            <ul class="list-unstyled">
                                <section class="d-none d-sm-block">
                                    <button><a href="#" class="navigation__dashMenu--item__link">
                                            <h6>Dashboard</h6>
                                        </a></button>

                                </section>
                                <li class="navigation__menu--item d-none d-sm-block">
                                    <a href="#" class="navigation__dashMenu--item__link"></a>
                                </li>

                                <li class="navigation__menu--item d-none d-sm-block">
                                    <a href="#" class="navigation__dashMenu--item__link"></a>
                                </li>
                                {{-- Mobile Side Menu Section --}}
                                <li class="navigation__menu--item">
                                    <a href="#"
                                        class="navigation__dashMenu--item__link d-sm-block d-lg-none">Dashboard</a>
                                </li>
                                <li class="navigation__menu--item">
                                    <a href="#"
                                        class="navigation__dashMenu--item__link d-sm-block d-lg-none">Profile</a>
                                </li>
                                <li class="navigation__menu--item">
                                    <a href="#" class="navigation__dashMenu--item__link d-sm-block d-lg-none">My
                                        Portfolio</a>
                                </li>
                                <li class="navigation__menu--item">
                                    <a href="#" class="navigation__dashMenu--item__link d-sm-block d-lg-none">Create
                                        Portfolio</a>
                                </li>
                                <li class="navigation__menu--item">
                                    <a href="#" class="navigation__dashMenu--item__link d-sm-block d-lg-none">Skills</a>
                                </li>
                                <li class="navigation__menu--item">
                                    <a href="#"
                                        class="navigation__dashMenu--item__link d-sm-block d-lg-none">Education</a>
                                </li>
                                <li class="navigation__menu--item">
                                    <a href="#" class="navigation__dashMenu--item__link d-sm-block d-lg-none">Change
                                        Password</a>
                                </li>
                                <li class="navigation__menu--item">
                                    <a href="#" class="navigation__dashMenu--item__link d-sm-block d-lg-none">Delete
                                        Account</a>
                                </li>
                                <li class="navigation__menu--item">
                                    <a href="#" class="navigation__dashMenu--item__link d-sm-block d-lg-none"></a>
                                </li>
                                {{-- Mobile Side Menu Section End --}}
                            </ul>
                        </nav>
                    </div>

                    <div class="rts__menu d-flex gap-5 gap-lg-4 gap-xl-5 align-items-center">

                        <div class="header__right__btn d-flex align-items-center gap-30">
                            <div class="notification__btn">
                                <div class="notification__icon dropdown" data-bs-toggle="dropdown">
                                    <i class='far fa-question-circle' style='font-size:24px'></i>
                                    {{-- <i class="fa fa-question-circle fa-5x " aria-hidden="true"></i> --}}
                                </div>
                            </div>
                            <div class="user__info ">
                                <div class="d-flex gap-3 align-items-center pointer" data-bs-toggle="dropdown">
                                    <div class="user__image if__employer">
                                        <img class="rounded-5" width="48" height="48"
                                            src="{{asset('assets/img/team/user_profile.png')}}" alt="">
                                    </div>
                                    <div class="user__name d-none d-xl-block">
                                        <span>Abel Developer</span>
                                    </div>
                                    <div class="dropdown__option d-none d-xl-block">
                                        <div class="dropdown__icon "><i class="fa-light fa-chevron-down"></i></div>
                                    </div>
                                </div>
                                <ul class="rts__dropdown dropdown-menu top-25">
                                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">My Portfolio</a></li>
                                    <li><a class="dropdown-item" href="#">Create Portfolio</a></li>
                                    <li><a class="dropdown-item" href="#">Skills</a></li>
                                    <li><a class="dropdown-item" href="#">Education</a></li>
                                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                                    <li><a class="dropdown-item" href="#">Delete Profile</a></li>
                                    <li><a class="dropdown-item" href="{{route('logout')}}"
                                            onclick="event.preventDefault(); document.getElementById('logout-userForm').submit();">Log
                                            Out</a></li>

                                    <form method="POST" id="logout-userForm" action="{{route('logout')}}">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                            <p class="small__btn d-none d-sm-flex d-xl-flex border-6 font-xs"
                                aria-label="Job Posting Button"></p>
                            <button class="d-md-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvas" aria-controls="offcanvas"><i
                                    class="fa-sharp fa-regular fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
