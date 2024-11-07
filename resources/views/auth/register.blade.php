<x-guest-layout>
        <!-- Form Wrapper with Background Color or Gradient -->
        <div class="bg-gradient-to-r from-blue-400 via-blue-600 to-indigo-700 p-8 rounded-2xl shadow-xl w-full sm:w-96">
            <h2 class="text-3xl font-semibold text-center text-white mb-6">Create an Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <x-input-label for="name" :value="__('Name')" class="font-medium text-gray-700" />
                    <div class="relative">
                        <x-text-input id="name" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out shadow-sm bg-white"
                                      type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"><i class="fas fa-user"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="font-medium text-gray-700" />
                    <div class="relative">
                        <x-text-input id="email" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out shadow-sm bg-white"
                                      type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"><i class="fas fa-envelope"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="font-medium text-gray-700" />
                    <div class="relative">
                        <x-text-input id="password" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out shadow-sm bg-white"
                                      type="password" name="password" required autocomplete="new-password" />
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"><i class="fas fa-lock"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-medium text-gray-700" />
                    <div class="relative">
                        <x-text-input id="password_confirmation" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out shadow-sm bg-white"
                                      type="password" name="password_confirmation" required autocomplete="new-password" />
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"><i class="fas fa-lock"></i></span>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-gray-200 hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <!-- Button with Color Matching to Gradients -->
                    <x-primary-button class="px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                        {{ __('Register') }}
                    </x-primary-button>

                    
                </div>
            </form>
        </div>

</x-guest-layout>
