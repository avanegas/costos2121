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

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Olvido su password? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
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
    </x-jet-authentication-card>
</x-guest-layout>
