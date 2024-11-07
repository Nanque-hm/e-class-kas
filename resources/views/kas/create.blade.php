<x-app-layout>
    <x-slot name="header">
        <div class="p-4 sm:ml-64">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Tambah Kas Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('kas.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="nama" value="Nama" class="text-gray-700 font-medium"/>
                            <x-text-input 
                                id="nama" 
                                name="nama" 
                                type="text" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama kas"
                                value="{{ old('nama') }}"
                            />
                            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('nama')" />
                        </div>

                        <div>
                            <x-input-label for="nominal" value="Nominal" class="text-gray-700 font-medium"/>
                            <x-text-input 
                                id="nominal" 
                                name="nominal" 
                                type="number" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="Masukkan nominal kas"
                                value="{{ old('nominal') }}"
                            />
                            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('nominal')" />
                        </div>

                        <div>
                            <x-input-label for="date" value="Tanggal" class="text-gray-700 font-medium"/>
                            <x-text-input 
                                id="date" 
                                name="date" 
                                type="date" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                value="{{ old('date') }}"
                            />
                            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('date')" />
                        </div>

                        <div class="flex items-center gap-4 mt-6">
                            <x-primary-button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">
                                Simpan Kas
                            </x-primary-button>

                            <a href="{{ route('kas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 transition-colors duration-200">
                                Kembali
                            </a>
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
    </style>
    @endpush
</x-app-layout>