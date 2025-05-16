<x-guest-layout>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}


    <div class="candidate__passwordchange">

        <div class="change__password">
            <div class="password__change__form max-content similar__form form__padding">
                <h6 class="text-center fw-semibold mb-30">Forgot Password</h6>

                <div class="text-center">
                    <p class="mb-4 text-sm text-gray-600">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                </div>
                <br/>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}" class="d-flex flex-column gap-3">
                    @csrf
                    <div class="form-group">
                        <label for="fmail" class="fw-medium text-dark mb-3">Your Email</label>
                        <div class="position-relative">
                            <input type="email" name="email" id="email" placeholder="Enter your email" :value="old('email')" required autofocus>
                            <i class="fa-sharp fa-light fa-envelope icon"></i>
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <button class="rts__btn w-100 common__btn he-3 fill__btn">Email Password Reset Link</button>
                    </div>
                </form>
                <span class="d-block text-center fw-medium">Remember Your Password? <a href="/login"
                    class="text-primary">Login</a> </span>

            </div>
        </div>


    </div>
</x-guest-layout>
