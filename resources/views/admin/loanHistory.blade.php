<x-app-layout>
    <section class="bg-blue-600 min-h-screen p-6 sm:p-8 lg:pl-64">
    

        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->

            <!-- Menampilkan pesan sukses jika ada -->
        

            <!-- Menampilkan pesan error jika ada -->
            @if (session('error'))
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                    <p class="text-center font-medium">{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 relative shadow-lg sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-white">
                        <thead class="text-xs text-white uppercase bg-blue-800 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID Buku</th>
                                <th scope="col" class="px-6 py-3">User</th>
                                <th scope="col" class="px-6 py-3">Judul Buku</th>
                                <th scope="col" class="px-6 py-3">Tanggal Pinjam</th>
                                <th scope="col" class="px-6 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pinjamBukus as $item)
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4">{{ $item->book_id }}</td>
                                    <td class="px-6 py-4">{{ $item->user->name }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $item->book->judul }}</td>
                                    <td class="px-6 py-4">{{ $item->tanggal_pinjam }}</td>
                                    <td class="px-6 py-4">{{ $item->tanggal_kembali }}</td>
                                    <td class="px-6 py-4">
                                        @if($item->status === 'borrowed')
                                            <span class="text-yellow-500 font-semibold">Dipinjam</span>
                                        @else
                                            <span class="text-green-600 font-semibold">Dikembalikan</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right flex justify-end items-center space-x-2">
                                        @if($item->status === 'borrowed')
                                            <!-- Form untuk perpanjang tanggal -->
                                            <form action="{{ route('pinjam.perpanjang', $item->id) }}" method="POST" class="flex items-center space-x-2">
                                                @csrf
                                                @method('PATCH')
                                                <input type="date" name="tanggal_kembali" class="text-sm px-2 py-1 rounded border border-gray-300" required value="{{ old('tanggal_kembali', $item->tanggal_kembali ?? date('Y-m-d')) }}">
                                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                                    Perpanjang
                                                </button>
                                            </form>

                                            <!-- Form untuk kembalikan paksa -->
                                            <form action="{{ route('pinjam.kembalikanPaksa', $item->id) }}" method="POST" class="flex items-center space-x-2">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                                                    Kembalikan Paksa!
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-700 dark:text-gray-300">Tidak ada data peminjaman</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>