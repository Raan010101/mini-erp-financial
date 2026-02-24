{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

<div class="flex items-center justify-between mt-4">

    @if (Route::has('register'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900"
           href="{{ route('register') }}">
            {{ __('Create an account') }}
        </a>
    @endif

    <div class="flex items-center">

        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 me-3"
               href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button>
            {{ __('Log in') }}
        </x-primary-button>

    </div>
</div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Mini ERP</h2>
            <p class="text-gray-500 text-sm mt-2">Financial Management System</p>
        </div>

        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-5">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-lg"
                        type="password"
                        name="password"
                        required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between mb-6 text-sm">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ms-2 text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-indigo-600 hover:underline"
                           href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <div>
                    <x-primary-button class="w-full justify-center py-3 rounded-lg text-sm tracking-wide">
                        Log In
                    </x-primary-button>
                </div>

                <!-- Register -->
                @if (Route::has('register'))
                    <div class="mt-6 text-center text-sm">
                        <span class="text-gray-500">Don't have an account?</span>
                        <a href="{{ route('register') }}"
                           class="text-indigo-600 hover:underline font-medium">
                            Create one
                        </a>
                    </div>
                @endif

            </form>
        </div>
    </div>
</x-guest-layout>
