<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="w-full sm:max-w-lg bg-gradient-to-r p-1 px-6 from-gray-300 via-gray-200 to-gray-100 shadow-md rounded-lg">
                <a href="/" class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-20 w-auto" src="{{asset('img/costos_color_op.svg')}}" alt="Costos">
                    <img class="hidden lg:block h-20 w-auto" src="{{asset('img/costos_color_op.svg')}}" alt="Costos">
                </a>
                <p>INGRESO PERMITIDO: Soy <b>decente</b>, mi <i><small>esencia</small></i> lo exige <b>:)</b></p>
            </div>
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
</x-guest-layout>
