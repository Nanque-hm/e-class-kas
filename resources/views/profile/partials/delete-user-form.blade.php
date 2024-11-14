<section class="space-y-6 p-4 bg-gray-50 rounded-lg shadow-md">
    <header class="text-center">

        <p class="mt-2 text-sm text-gray-600">
            {{ __('Tindakan ini tidak dapat dibatalkan. Semua data akan dihapus secara permanen.') }}
        </p>
    </header>

    <div class="flex justify-center">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-6 py-3 text-white bg-red-600 hover:bg-red-700 transition duration-200 rounded-md shadow-lg"
        >{{ __('Hapus Akun') }}</x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white rounded-lg shadow-lg">
            @csrf
            @method('delete')

            <h2 class="text-xl font-semibold text-gray-800 text-center">
                {{ __('Apakah Kamu Benar-Benar Ingin Menghapus Akun Ini?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600 text-center">
                {{ __('Setelah akun Anda dihapus, semua data akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
            </p>

            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-200"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-600" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-gray-300 hover:bg-gray-400 transition duration-200 rounded-md">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 bg-red-600 hover:bg-red-700 transition duration-200 rounded-md">
                    {{ __('Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
