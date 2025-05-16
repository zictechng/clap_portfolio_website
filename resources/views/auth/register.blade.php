{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="candidate__passwordchange">

        <div class="change__password mt-60 mb-40" style="margin-top: 100px;">
            <div class="password__change__form max-content similar__form form__padding">
                <h6 class="mb-0">Create your account</h6>
                    <br/>
                    <p style="font-size: 14px !important; color: #aaaaaa; text-align:center;">Showcase your projects for free. No credit card required</p>
                    {{-- <div class="d-block has__line text-center">
                        <p>Set up your portfolio online</p>
                    </div> --}}


                    <div class="d-flex gap-4 flex-wrap justify-content-center mt-20 mb-20">
                        <div class="is__social google">
                            <button><img src="{{asset('assets/img/icon/google-small.svg')}}" alt="">Sign Up with Google</button>
                        </div>

                    </div>
                    <div class="d-block has__line text-center">
                        <p>Or</p>
                    </div>

                    <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="d-flex flex-column gap-3">
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
                            <button class="rts__btn small__btn common__btn he-4 rounded-5 fill__btn">Create account</button>
                        </div>
                    </form>

                    {{-- <div class="d-block has__line text-center">
                    <p>Or</p>
                    </div>
                <div class="d-flex gap-4 flex-wrap justify-content-center mt-20 mb-20">
                    <div class="is__social google">
                        <button><img src="{{asset('assets/img/icon/google-small.svg')}}" alt="">Continue with Google</button>
                    </div>
                    <div class="is__social facebook">
                        <button><img src="{{asset('assets/img/icon/facebook-small.svg')}}" alt="">Continue with Facebook</button>
                    </div>
                </div> --}}


                <div class="d-flex gap-4 flex-wrap justify-content-center mt-20 mb-30"></div>
                <p style="font-size: 14px !important; color: #aaaaaa; text-align:center;">
                    By creating your account, you agree to accept all Clap Academy's <a href="#">Terms of service</a> and <a href="#">Privacy Policy</a>.
                </p>


                <span class="d-block text-center fw-medium">I have an account <a href="{{route('login')}}"
                    class="text-primary">Login</a>
                </span>
            </div>
        </div>
    </div>

</x-guest-layout>
