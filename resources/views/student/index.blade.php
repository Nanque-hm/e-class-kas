<x-app-layout>
<x-slot name="header">
        <div class="p-4 sm:ml-64">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                    
                    {{ __('Daftar Siswa') }}
                </h2>
                <span class="text-sm text-gray-500">Total Siswa: {{ $students->count() }}</span>
            </div>
        </div>

    </x-slot>

    
    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-700">Data Siswa</h3>
                        <a href="{{route('student.create')}}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-150 ease-in-out transform hover:scale-105 transition-transform duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Tambah Siswa
                        </a>
                       <a href="{{route('students.export')}}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Export
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rombel</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($students as $student)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$loop->iteration}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($student->photo)
                                        <img src="{{asset('/storage/'.$student->photo)}}" 
                                             class="h-16 w-16 rounded-full object-cover border-2 border-gray-200"
                                             alt="Foto {{$student->name}}">
                                        @else
                                        <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center">
                                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{$student->nis}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{$student->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{$student->gender == 'B' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800'}}">
                                            {{$student->gender == "B" ? "Laki-laki" : "Perempuan"}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium
                                            {{$student->rombel->name ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}}">
                                            {{$student->rombel->name ?? "Belum ada kelas"}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{route('student.edit', $student->id)}}" 
                                               class="text-indigo-600 hover:text-indigo-900  w-14 h-9.5 bg-blue-900 hover:scale-105 hover:bg-blue-700 rounded-lg justify-center content-center pl-4">
                                                <svg class="w-5 h-5 text-white " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            {{-- <form method="post" action="{{ route('student.destroy', $student->id) }}" 
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form> --}}
                                            <form method="post" action="{{ route('student.destroy', $student->id) }}" class="inline" onsubmit="return confirmDelete(event)">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button class="flex items-center gap-1 transform hover:scale-105 transition-transform duration-200">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah Anda yakin ingin menghapus kelas ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
            return false;
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>