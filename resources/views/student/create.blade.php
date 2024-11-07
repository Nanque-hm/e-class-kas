<x-app-layout>
    <x-slot name="header">
        <div class="p-4 sm:ml-64">
            <div class="flex items-center">
                <a href="{{ route('student.index') }}" class="mr-4">
                    <svg class="w-6 h-6 text-gray-600 hover:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tambah Data Siswa Baru') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <x-content>
        <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-sm">
            <form method="post" action="{{ route('student.store') }}" class="space-y-6" enctype="multipart/form-data">
                @csrf

                <!-- NIS Field -->
                <div class="space-y-2">
                    <x-input-label for="nis" value="Nomor Induk Siswa (NIS)" />
                    <x-text-input 
                        id="nis" 
                        name="nis" 
                        type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        value="{{ old('nis') }}"
                        placeholder="Masukkan NIS" />
                    <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                </div>

                <!-- Name Field -->
                <div class="space-y-2">
                    <x-input-label for="name" value="Nama Lengkap Siswa" />
                    <x-text-input 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <!-- Rombel Field -->
                <div class="space-y-2">
                    <x-input-label for="rombel" value="Rombongan Belajar" />
                    <select name="rombel_id" id="rombel" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Pilih Rombel</option>
                        @foreach ($rombels as $r)
                            <option value="{{ $r->id }}" {{ old('rombel_id') == $r->id ? 'selected' : '' }}>
                                {{ $r->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('rombel_id')" />
                </div>

                <!-- Gender Field -->
                <div class="space-y-2">
                    <x-input-label for="gender" value="Jenis Kelamin" />
                    <div class="mt-2 flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="B" 
                                   class="form-radio text-indigo-600" 
                                   {{ old('gender') == 'B' ? 'checked' : '' }}>
                            <span class="ml-2">Laki-laki</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="G" 
                                   class="form-radio text-indigo-600" 
                                   {{ old('gender') == 'G' ? 'checked' : '' }}>
                            <span class="ml-2">Perempuan</span>
                        </label>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                </div>

                <!-- Photo Field -->
                <div class="space-y-2">
                    <x-input-label for="photo" value="Foto Siswa" />
                    <label class="block">
                        <span class="sr-only">Choose file</span>
                        <input type="file" name="photo" id="photo"
                            class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-indigo-50 file:text-indigo-700
                            hover:file:bg-indigo-100"/>
                    </label>
                    <p class="text-sm text-gray-500">PNG, JPG, atau JPEG (Maks. 2MB)</p>
                    <x-input-error class="mt-2" :messages="$errors->get('photo')"/>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end mt-6 space-x-3">
                    <a href="{{ route('student.index') }}" 
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