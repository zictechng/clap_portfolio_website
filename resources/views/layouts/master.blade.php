<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Your Ultimate Job HTML Template">
    <meta name="keywords" content="Job, Resume, Employer, Agency">
    <link rel="canonical" href="#">
    <meta name="robots" content="index, follow">
    <!-- for open graph social media -->
    <meta property="og:title" content="Your Ultimate Job HTML Template">
    <meta property="og:description" content="Your Ultimate Job HTML Template">
    <meta property="og:image" content="../../../www.example.com/image.html">
    <meta property="og:url" content="#https://html.themewant.com/jobpath/">
    <!-- for twitter sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Your Ultimate Job HTML Template">
    <meta name="twitter:description" content="Your Ultimate Job HTML Template">
    <!-- fabicon -->
    <link rel="shortcut-icon" href="{{asset('assets/img/favicon-16x16.png')}}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&amp;display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon-16x16.png')}}" type="image/x-icon">
    <title>Clap Academy - Project Seeker &amp; Job Seeker and employee</title>
    <!-- rt icons -->
    <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
    <!-- all plugin css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style_update.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @livewireStyles
</head>


<body class="is__home home__three">


    <style type="text/css">
        .rounded{
  border-radius:50% !important;
    }
    .main_page_background {
        background-color: #F9F9F9;
    }
    .item_page_background {
        background-color: #FFFFFF;
        border-radius:8px;
    };
    </style>
    <!-- header area -->
        @include('user.mainHeader')
    <!-- banner area -->

    <!-- banner area end -->
     <!-- Main page comes here -->

        {{$slot}}

        @include('user.footer')


    <!-- Login Modal -->
    <div class="modal similar__modal fade " id="loginModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="max-content similar__form form__padding">
                    <div class="d-flex mb-3 align-items-center justify-content-between">
                        <h6 class="mb-0">Login To</h6>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-regular fa-xmark text-primary"></i>
                        </button>
                    </div>
                    <div class="d-block has__line text-center">
                        <p>Access your portfolio account</p>
                    </div>
                    <x-jet-validation-errors class="mb-4" />

                    <form class="d-flex flex-column gap-3" method="POST" action="{{route('login')}}" >
                        @csrf

                        <div class="form-group">
                            <label for="email" class="fw-medium text-dark mb-3">Your Email</label>
                            <div class="position-relative">
                                <input type="email" name="email" id="email" placeholder="Enter your email" :value="old('email')" required autofocus>
                                <i class="fa-light fa-user icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="fw-medium text-dark mb-3">Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" id="password"
                                    placeholder="Enter your password" required autocomplete="current-password">
                                <i class="fa-light fa-lock icon"></i>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between align-items-center fw-medium">
                            <div class="form-check">
                                <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="forgot__password text-para" data-bs-toggle="modal"
                                data-bs-target="#forgotModal">Forgot Password?</a>
                        </div>
                        <div class="form-group my-3">
                            <button class="rts__btn w-100 common__btn he-3 fill__btn">Login</button>
                        </div>
                    </form>
                    <div class="d-block has__line text-center">
                        <p>Or</p>
                    </div>
                    <div class="d-flex gap-4 flex-wrap justify-content-center mt-20 mb-20">
                        <div class="is__social google">
                            <button><img src="{{asset('assets/img/icon/google-small.svg')}}" alt="">Continue with Google</button>
                        </div>
                        <div class="is__social facebook">
                            <button><img src="{{asset('assets/img/icon/facebook-small.svg')}}" alt="">Continue with Facebook</button>
                        </div>
                    </div>
                    <span class="d-block text-center fw-medium">Don`t have an account? <a href="#"
                            data-bs-target="#signupModal" data-bs-toggle="modal" class="text-primary">Sign Up</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- signup form -->
    <div class="modal similar__modal fade " id="signupModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="max-content similar__form form__padding">
                    <div class="d-flex mb-3 align-items-center justify-content-between">
                        <h6 class="mb-0">Create A Free Account</h6>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-regular fa-xmark text-primary"></i>
                        </button>
                    </div>
                    <div class="d-block has__line text-center">
                        <p>Set up your portfolio online</p>
                    </div>

                    <x-jet-validation-errors class="mb-4" />
                <form class="d-flex flex-column gap-3">
                    @csrf
                    <div class="row form-group mt-20">
                        <div class="col position-relative">
                        <input type="text" name="name" id="name" :value="old('name')" required autofocus autocomplete="name" placeholder="First Name">
                        <i class="fa-light fa-user icon"></i>
                        </div>
                        <div class="col position-relative">
                        <input type="text" name="lname" id="lname" :value="old('lname')" required autofocus autocomplete="lname" placeholder="Surname Name">
                                <i class="fa-light fa-user icon"></i>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="signemail" class="fw-medium text-dark mb-3">Your Email</label>
                            <div class="position-relative">
                                <input type="email" name="email" id="email" :value="old('email')" required placeholder="Enter your email"
                                    required>
                                <i class="fa-sharp fa-light fa-envelope icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="spassword" class="fw-medium text-dark mb-3">Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" id="password" required autocomplete="new-password" placeholder="Enter your password"
                                    required>
                                <i class="fa-light fa-lock icon"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="spassword" class="fw-medium text-dark mb-3">Confirm Password</label>
                            <div class="position-relative">
                                <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" placeholder="Enter confirm password"
                                    required>
                                <i class="fa-light fa-lock icon"></i>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <button class="rts__btn w-100 common__btn he-3 fill__btn">Sign Up</button>
                        </div>
                    </form>
                    <div class="d-block has__line text-center">
                        <p>Or</p>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center gap-4 mt-20 mb-20">
                        <div class="is__social google">
                            <button><img src="{{asset('assets/img/icon/google-small.svg')}}" alt="">Continue with Google</button>
                        </div>
                        <div class="is__social facebook">
                            <button><img src="{{asset('assets/img/icon/facebook-small.svg')}}" alt="">Continue with Facebook</button>
                        </div>
                    </div>
                    <span class="d-block text-center fw-medium">Have an account? <a href="#"
                            data-bs-target="#loginModal" data-bs-toggle="modal" class="text-primary">Login</a> </span>
                </div>
            </div>
        </div>
    </div>

    <!-- forgot password form -->
    <div class="modal similar__modal fade " id="forgotModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="max-content similar__form form__padding">
                    <div class="d-flex mb-3 align-items-center justify-content-between">
                        <h6 class="mb-0">Forgot Password</h6>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-regular fa-xmark text-primary"></i>
                        </button>
                    </div>
                    <form action="#" class="d-flex flex-column gap-3">

                        <div class="form-group">
                            <label for="fmail" class="fw-medium text-dark mb-3">Your Email</label>
                            <div class="position-relative">
                                <input type="email" name="email" id="fmail" placeholder="Enter your email" required>
                                <i class="fa-sharp fa-light fa-envelope icon"></i>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <button class="rts__btn w-100 common__btn he-3 fill__btn">Reset Password</button>
                        </div>
                    </form>

                    <span class="d-block text-center fw-medium">Remember Your Password? <a href="#"
                            data-bs-target="#loginModal" data-bs-toggle="modal" class="text-primary">Login</a> </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Side Menu -->
        @include('user.mobile_menu')

    <!-- THEME PRELOADER START -->
    <div class="loader-wrapper">
        <div class="loader">
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- THEME PRELOADER END -->

    <!-- Scroll to up Button -->
    <button type="button" class="rts__back__top" id="rts-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!-- all plugin js -->
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    @livewireScripts
</body>

</html>
