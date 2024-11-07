<x-app-layout>
    <x-slot name="header">
        <div class="p-4 sm:ml-64">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Information Section -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Informasi Profil</h3>
                            <p class="text-sm text-gray-600 mt-1">Perbarui informasi profil dan alamat email akun Anda</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Update Password</h3>
                            <p class="text-sm text-gray-600 mt-1">Pastikan akun Anda menggunakan password yang panjang dan acak untuk tetap aman</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Hapus Akun</h3>
                            <p class="text-sm text-gray-600 mt-1">Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen</p>
                        </div>
                    </div>
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 
                        0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .transition-colors {
            transition-property: background-color, border-color, color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }

        .hover\:bg-gray-50:hover {
            transition: all 0.2s ease-in-out;
        }

        /* Additional styling for form elements */
        input, select, textarea {
            @apply rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50;
            transition: all 0.2s ease-in-out;
        }

        .form-section {
            @apply border-b border-gray-200 pb-6 mb-6;
        }

        .form-section:last-child {
            @apply border-b-0 pb-0 mb-0;
        }
    </style>
    @endpush
</x-app-layout>