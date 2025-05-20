<!DOCTYPE html>
<html lang="en"><meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clap Academy - Account Verification</title>

    <!-- Custom fonts for this template-->
    <link href="{{('user/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{('css/sb-admin-2.min.css')}}" rel="stylesheet">

    @livewireStyles
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <br/><br/><br/>
        <div class="row justify-content-center">

            <div class="col-lg-5">

                <!-- Basic login form-->
                <div class="card shadow-lg border-0 rounded-lg mt-5 bg-gradient-primary">
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/user-login">
                        <div class="sidebar-brand-icon mt-3">
                            <img src="{{asset('assets/img/logo/logo_white.png')}}" width="130" height="50" >
                        </div>
                        {{-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
                    </a>
                    <div class="justify-content-center text-center">
                        <h1 class="fw-light my-4 h4 mb-4 text-white"><strong>Verify Account</strong></h1>
                    </div>

                    <div class="card-body custom_logins">
                        <!-- Login form-->
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" role="alert">
                                {{Session::get('message')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                            <p class="bg-gradient-primary text-center" style="color:white;">OTP code send to <strong> welcome@gmail.com</strong></p>

                        <p class="text-center"><x-jet-validation-errors class="mb-4" style="color: #D59133" /></p>

                        <form method="POST" action="{{ route('otp_activate') }}">
                            @csrf
                            <!-- Form Group (email address)-->
                            <div class="mb-3 custom_input_fields">
                                <label class="small mb-1 text-white" for="inputEmailAddress">OTP Code</label>
                                <input class="form-control" type="text" name="otp_code" id="otp_code" placeholder="Enter OTP Code" autofocus required>
                            </div>

                            <!-- Form Group (remember password checkbox)-->
                            <div class="mb-3 float-right">
                                <div class="form-check">
                                    <a class="small" href="#">Resend Code</a>
                                </div>
                            </div>

                            <br/>

                            <button class="btn btn-google border-0 google_button btn-user btn-block button_login rounded-pill">
                                Activate
                            </button>
                            <div class="small mt-3 text-center" style="color:white;">
                                If you didn't receive the code, please check your spam folder or click resend code to request a new code.<br/>
                                <a href="#" style="color: #D59133"> Terms of service</a> and <a href="" style="color: #D59133"> privacy policy.</a>
                                <br/><br/>

                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{('user/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{('user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{('user/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{('user/js/sb-admin-2.min.js')}}"></script>

    @livewireScripts
</body>
</html>

