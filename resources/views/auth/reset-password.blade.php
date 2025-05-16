<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}

    <div class="candidate__passwordchange">

        <div class="change__password">
            <div class="password__change__form max-content similar__form form__padding">
                <h6 class="text-center fw-semibold mb-30">Reset Password</h6>

                <div class="text-center">
                    <p class="mb-4 text-sm text-gray-600">Enter new details to reset your login information</p>
                </div>
                <br/>

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}" class="d-flex flex-column gap-3">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <label for="email" class="fw-medium text-dark mb-3">Your Email</label>
                        <div class="position-relative">
                            <input type="email" name="email" id="email" placeholder="Enter your email" :value="old('email', $request->email)" required autofocus>
                            <i class="fa-sharp fa-light fa-envelope icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="fw-medium text-dark mb-3">Your Password</label>
                        <div class="position-relative">
                            <input type="password" name="password" id="password" placeholder="Enter new password" required autocomplete="new-password">
                            <i class="fa-light fa-lock icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="fw-medium text-dark mb-3">Confirm Password</label>
                        <div class="position-relative">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter new password" required autocomplete="new-password">
                            <i class="fa-light fa-lock icon"></i>
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <button class="rts__btn w-100 common__btn he-3 fill__btn">Reset Password</button>
                    </div>
                </form>
                <span class="d-block text-center fw-medium">Remember Your Password? <a href="/login"
                    class="text-primary">Login</a> </span>

            </div>
        </div>
    </div>

</x-guest-layout>
