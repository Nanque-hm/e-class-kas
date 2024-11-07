<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form Wrapper with Background Color or Gradient -->
    <div class="bg-gradient-to-r from-blue-400 via-blue-600 to-indigo-700 p-8 rounded-2xl shadow-xl w-full sm:w-96">
        <h2 class="text-3xl font-semibold text-center text-white mb-6">Log In</h2>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="font-medium text-gray-700" />
                <div class="relative">
                    <x-text-input id="email" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out shadow-sm bg-white"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"><i class="fas fa-envelope"></i></span>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="font-medium text-gray-700" />
                <div class="relative">
                    <x-text-input id="password" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out shadow-sm bg-white"
                                  type="password" name="password" required autocomplete="current-password" />
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"><i class="fas fa-lock"></i></span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-200 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <!-- Log in Button with Gradients -->
                <x-primary-button class="px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
