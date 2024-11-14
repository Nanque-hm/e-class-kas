<x-app-layout>
    <x-slot name="header">
        <div class="p-4 sm:ml-64">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                {{ __('Profile Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Information Section -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl transform transition-all hover:shadow-2xl">
                <div class="border-b border-gray-100">
                    <div class="p-6 bg-gradient-to-r from-purple-500 to-blue-500 text-center">
                        <div class="flex justify-center items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-5 text-left">
                                <h3 class="text-2xl font-bold text-white">Informasi Profil</h3>
                                <p class="text-purple-100 mt-1">Perbarui informasi profil dan alamat email akun Anda</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-8 bg-white">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl transform transition-all hover:shadow-2xl">
                <div class="border-b border-gray-100">
                    <div class="p-6 bg-gradient-to-r from-green-500 to-teal-500 text-center">
                        <div class="flex justify-center items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="ml-5 text-left">
                                <h3 class="text-2xl font-bold text-white">Update Password</h3>
                                <p class="text-green-100 mt-1">Pastikan akun Anda menggunakan password yang kuat untuk keamanan maksimal</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-8 bg-white">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl transform transition-all hover:shadow-2xl">
                <div class="border-b border-gray-100">
                    <div class="p-6 bg-gradient-to-r from-red-500 to-pink-500 text-center">
                        <div class="flex justify-center items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </div>
                            <div class="ml-5 text-left">
                                <h3 class="text-2xl font-bold text-white">Hapus Akun</h3>
                                <p class="text-red-100 mt-1">Tindakan ini tidak dapat dibatalkan. Semua data akan dihapus secara permanen.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-8 bg-white">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .shadow-xl {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
                        0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .transform {
            transition: all 0.3s ease-in-out;
        }

        .hover\:shadow-2xl:hover {
            transform: translateY(-5px);
        }

        /* Form styling */
        input, select, textarea {
            @apply rounded-lg border-gray-300 w-full;
            transition: all 0.2s ease;
        }

        input:focus, select:focus, textarea:focus {
            @apply ring-2 ring-purple-500 border-purple-500;
            transform: translateY(-1px);
        }

        .btn {
            @apply px-6 py-3 rounded-lg font-semibold text-white transition-all duration-200 ease-in-out;
            transform: translateY(0);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            @apply bg-gradient-to-r from-purple-600 to-blue-600;
        }

        .btn-danger {
            @apply bg-gradient-to-r from-red-600 to-pink-600;
        }

        /* Custom animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Card hover effects */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: scale(1.02);
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add fade-in animation on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.shadow-xl').forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    element.style.transition = 'all 0.5s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
    @endpush
</x-app-layout>
