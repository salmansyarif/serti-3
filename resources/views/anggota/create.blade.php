<x-app-layout>
    <section class="bg-blue-800 dark:bg-blue-900 p-5 min-h-screen">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12 lg:pl-64">

        
            <!-- Start coding here -->
            <div class="bg-blue-900 dark:bg-blue-900 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="m-5 flex items-center justify-center space-y-4 sm:space-y-0">
                    <h1 class="text-3xl font-extrabold text-white">
                        PINJAM BUKU
                    </h1>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-lg rounded-lg">
                        <thead class="text-xs text-white uppercase bg-blue-900 dark:bg-blue-900">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">Judul Buku</th>
                                <th scope="col" class="px-6 py-3 text-center">Penulis</th>
                                <th scope="col" class="px-6 py-3 text-center">Tanggal Pinjam</th>
                                <th scope="col" class="px-6 py-3 text-center">Tanggal Kembali</th>
                 
                                <th scope="col" class="px-6 py-3 text-center">Status</th>
                                <th scope="col" class="px-6 py-3 text-center">Sisa Hari</th> <!-- Kolom untuk Sisa Hari -->
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                                <tr class="bg-white border-b dark:bg-blue-800 dark:border-blue-700 hover:bg-blue-100 dark:hover:bg-blue-600 transition-all">
                                    <td class="px-6 py-3 text-center">{{ $loan->book->judul }}</td>
                                    <td class="px-6 py-3 text-center">{{ $loan->book->penulis }}</td>
                                    <td class="px-6 py-3 text-center">{{ $loan->tanggal_pinjam }}</td>
                                    <td class="px-6 py-3 text-center">{{ $loan->tanggal_kembali }}</td>
                             
                                    <td class="px-6 py-3 text-center">
                                        @if ($loan->status === 'borrowed')
                                            <span class="text-yellow-500">Dipinjam</span>
                                        @elseif ($loan->status === 'returned')
                                            <span class="text-green-500">Sudah Dikembalikan</span>
                                        @endif
                                    </td>

                                    <!-- Kolom Sisa Hari -->
                                    <td class="px-6 py-3 text-center">
                                        @if ($loan->status === 'borrowed') 
                                            @php
                                                // Menggunakan Carbon untuk menghitung sisa hari atau keterlambatan
                                                $tanggal_pinjam = \Carbon\Carbon::parse($loan->tanggal_pinjam);
                                                $tanggal_kembali = \Carbon\Carbon::parse($loan->tanggal_kembali);
                                                $hari_selisih = $tanggal_kembali->diffInDays($tanggal_pinjam, false); // false untuk menghitung apakah positif atau negatif

                                                if ($hari_selisih < 0) {
                                                    $status = "sisa hari " . abs($hari_selisih) . " Hari";
                                                } else {
                                                    $status = "Sisa Hari: " . $hari_selisih . " Hari";
                                                }
                                            @endphp
                                            <span>{{ $status }}</span>
                                        @else
                                            <!-- Jika sudah dikembalikan, kosongkan kolom Sisa Hari -->
                                            <span>-</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-3 text-center">
                                        @if ($loan->status === 'borrowed')
                                            <form action="{{ route('anggota.kembalikan', $loan->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="relative inline-flex items-center justify-center p-2 mb-2 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-blue-500 to-teal-500 hover:from-blue-400 hover:to-teal-400 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-800">
                                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-transparent dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                        Kembalikan
                                                    </span>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
