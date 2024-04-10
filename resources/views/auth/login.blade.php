<x-guest-layout>
    <div class="flex items-center justify-center md:justify-start bg-cover" style="background-image: url('logo-derecha.jpg')">
        <x-authentication-card class="flex items-center justify-center">
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>
            
            <h1 class="text-2xl font-bold text-center mb-4 border-b-2 text-blue-500 border-blue-500">INICIAR SESION</h1>

            <x-validation-errors class="mb-4" />
            

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-button class="ms-4">
                        {{ __('Ingresar') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
        {{-- <img src="logo-derecha.jpg" alt="" class="col-span-2 h-full opacity-95"> --}}
    </div>

</x-guest-layout>