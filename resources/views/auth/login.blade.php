{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
     <!-- breadcrumb area -->
     <div class="mt-40"></div>
     {{-- <div class="rts__section breadcrumb__background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative d-flex justify-content-between align-items-center">
                    <div class="breadcrumb__area max-content breadcrumb__padding z-2">
                        <h5 class="mb-3 text-white">User Login</h5>
                        <nav>
                            <ul class="breadcrumb m-0 lh-1">
                              <li class="breadcrumb-item"><a href="/">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Secured Area</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">

                        <div class="shape__two common">
                            <img src="assets/img/breadcrumb/shape-2.svg" alt="">
                        </div>
                        <div class="shape__three common">
                            <img src="assets/img/breadcrumb/shape-3.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <!-- breadcrumb area end -->

    <div class="candidate__passwordchange">

        <div class="change__password" style="margin-top: 100px;">
            <div class="password__change__form max-content similar__form form__padding mt-30">
                <h6 class="text-center fw-semibold mb-30">Login</h6>

                {{-- <div class="d-block has__line text-center">
                    <p>Access your portfolio account</p>
                </div> --}}
                <div class="d-flex gap-4 flex-wrap justify-content-center mt-20 mb-20">
                    <div class="is__social google">
                        <button><img src="{{asset('assets/img/icon/google-small.svg')}}" alt="">Login with Google</button>
                    </div>

                </div>
                <div class="d-block has__line text-center">
                    <p>Or</p>
                </div>
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('login') }}" class="d-flex flex-column gap-3">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="fw-medium text-dark mb-3">Your Email</label>
                        <div class="position-relative">
                            <input type="email" name="email" id="email" placeholder="Enter your email" autofocus>
                            <i class="fa-light fa-user icon"></i>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="fw-medium text-dark mb-3">Password</label>
                        <div class="position-relative">
                            <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="current-password">
                            <i class="fa-light fa-lock icon"></i>
                            @error('form.password')<span class="text-red-600">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center fw-medium">
                        <div class="form-check">
                            <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                        <a href="/forgot-password" class="forgot__password text-para">Forgot Password?</a>
                    </div>
                    <div class="form-group my-3">
                        <button class="rts__btn small__btn common__btn he-4 rounded-5 fill__btn" type="submit">Login</button>
                    </div>
                </form>

                <div class="d-flex gap-4 flex-wrap justify-content-center mt-20 mb-30"></div>
                <p style="font-size: 14px !important; color: #aaaaaa; text-align:center;">
                    By logging in, you agree to accept all Clap Academy's <a href="#">Terms of service</a> and <a href="#">Privacy Policy</a>.
                </p>
                <span class="d-block text-center fw-medium">Don`t have an account? <a href="{{route('register')}}" class="text-primary">Sign Up</a>
                </span>
            </div>
        </div>
    </div>

</x-guest-layout>
