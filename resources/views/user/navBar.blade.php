@php
    $user = Auth::user();
    $profileImage = $user && $user->profile_url && file_exists(public_path('profile_images/' . $user->profile_url));
@endphp

<div class="rts__menu d-flex gap-5 align-items-center">
    <div class="navigation d-none d-lg-block">
        <nav class="navigation__menu" id="offcanvas__menu">
            <ul class="list-unstyled">
                <li class="navigation__menu--item">
                    <a href="/" class="navigation__menu--item__link">Home</a>
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
                    
                    <div class="user__info ">
                        <div class="d-flex gap-3 align-items-center pointer" data-bs-toggle="dropdown">

                            @if($profileImage)
                                <img class="rounded" src="{{ asset('profile_images/' . $user->profile_url) }}" alt="{{ $user->name }}" style="width: 35px; height: 35px;">
                            @else
                                <div class="user__image">
                                    <i class="bi bi-person-circle" style="font-size: 2rem; color: #aeb0b5;" width="35px"></i>
                                </div>
                            @endif

                            <div class="user__name d-none d-xl-block">
                                <span>{{Auth::user()->name}}</span>
                            </div>
                            <div class="dropdown__option d-none d-xl-block">
                                <div class="dropdown__icon " ><i class="fa-light fa-chevron-down"></i></div>
                            </div>
                        </div>
                        <ul class="rts__dropdown dropdown-menu top-25">
                            <li><a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="/user/portfolio">My Projects</a></li>
                            <li><a class="dropdown-item" href="/user/edit-profile">Change Password</a></li>
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

        @endif

    @endif

</div>
