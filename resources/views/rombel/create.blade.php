<x-app-layout>
    <x-slot name="header">
        <div class="p-4 sm:ml-64">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Tambah Kelas') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Tambah Kelas Baru</h3>
                            <p class="text-sm text-gray-600 mt-1">Masukkan informasi untuk kelas baru</p>
                        </div>
                    </div>

                    <form method="post" action="{{ route('rombel.store') }}" class="space-y-6">
                        @csrf

                        <div class="max-w-xl">
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="name" value="Nama Kelas" class="text-gray-700 font-medium"/>
                                    <x-text-input 
                                        id="name" 
                                        name="name" 
                                        type="text" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-colors duration-200"
                                        value="{{ old('name') }}"
                                        placeholder="Masukkan nama kelas"
                                    />
                                    <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('name')" />
                                </div>
                            </div>

                            <div class="flex items-center gap-4 mt-6">
                                <x-primary-button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Simpan Kelas
                                </x-primary-button>

                                <a href="{{ route('rombel.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </form>
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

        input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }

        .hover\:bg-gray-50:hover {
            transition: all 0.2s ease-in-out;
        }
    </style>
    @endpush
</x-app-layout>