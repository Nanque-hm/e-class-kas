<x-app-layout>
    <x-slot name="header">
        <div class="p-4 sm:ml-64">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                    {{ __('Laporan Kas') }}
                </h2>
                
            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form Filter -->
                    <form action="{{ route('laporan.generate') }}" method="POST" class="mb-6">
                        @csrf
                        <div class="flex gap-4 items-end">
                            <div>
                                <x-input-label for="start_date" value="Tanggal Awal" />
                                <x-text-input
                                    type="date"
                                    name="start_date"
                                    id="start_date"
                                    value="{{ request('start_date') }}"
                                    class="mt-1"
                                    required
                                />
                            </div>
                            <div>
                                <x-input-label for="end_date" value="Tanggal Akhir" />
                                <x-text-input
                                    type="date"
                                    name="end_date"
                                    id="end_date"
                                    value="{{ request('end_date') }}"
                                    class="mt-1"
                                    required
                                />
                            </div>
                            <x-primary-button>
                                Tampilkan Laporan
                            </x-primary-button>
                        </div>
                    </form>

                    @if($transactions)
                        <!-- Hasil Laporan -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3">Tanggal</th>
                                        <th class="px-6 py-3">Keterangan</th>
                                        <th class="px-6 py-3">Jenis</th>
                                        <th class="px-6 py-3">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $transaction)
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4">
                                                {{ $transaction->date }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $transaction->description }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $transaction->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                            </td>
                                            <td class="px-6 py-4">
                                                Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center">
                                                Tidak ada data transaksi
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
