<x-app-layout>
    <x-slot name="header">
        <div class="p-4 sm:ml-64">
            <div class="flex items-center">
                <a href="{{ route('kas.index') }}" class="mr-4">
                    <svg class="w-6 h-6 text-gray-600 hover:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tambah Data Kas') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <x-content>
        <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-sm">
            <form method="post" action="{{ route('kas.store') }}" class="space-y-6">
                @csrf

                <!-- Student Field -->
                <div class="space-y-2">
                    <x-input-label for="student_id" value="Nama Siswa" />
                    <select name="student_id" id="student_id" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Pilih Siswa</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('student_id')" />
                </div>

                <!-- Nominal Field -->
                <div class="space-y-2">
                    <x-input-label for="nominal" value="Nominal" />
                    <x-text-input 
                        id="nominal" 
                        name="nominal" 
                        type="number" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        value="{{ old('nominal') }}"
                        placeholder="Masukkan nominal" />
                    <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
                </div>

                <!-- Date Field -->
                <div class="space-y-2">
                    <x-input-label for="date" value="Tanggal" />
                    <x-text-input 
                        id="date" 
                        name="date" 
                        type="date" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        value="{{ old('date') }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('date')" />
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end mt-6 space-x-3">
                    <a href="{{ route('kas.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Batal
                    </a>
                    <x-primary-button>
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Data
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-content>
</x-app-layout>