<x-app-layout>
    <x-slot name="header">
        <div class="p-4 sm:ml-64">
            <div class="flex items-center">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ __('Edit Kas') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('kas.update', $kas->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Student Selection -->
                        <div>
                            <x-input-label for="student_id" :value="__('Nama Siswa')" />
                            <select id="student_id" name="student_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Pilih Siswa</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}" {{ $kas->student_id == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                        </div>

                        <!-- Nominal -->
                        <div>
                            <x-input-label for="nominal" :value="__('Nominal')" />
                            <x-text-input id="nominal" name="nominal" type="number" class="mt-1 block w-full"
                                         :value="old('nominal', $kas->nominal)" required />
                            <x-input-error :messages="$errors->get('nominal')" class="mt-2" />
                        </div>

                        <!-- Date -->
                        <div>
                            <x-input-label for="date" :value="__('Tanggal')" />
                            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full"
                                         :value="old('date', $kas->date->format('Y-m-d'))" required />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>
                            <a href="{{ route('kas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
