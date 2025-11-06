<x-app-layout>
    <section class="bg-blue-900 dark:bg-blue-800 p-6 sm:p-8 min-h-screen">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
     

            <!-- Menampilkan Flash Message -->
       

            <!-- Table Wrapper -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <!-- Table -->
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-lg rounded-lg">
                        <thead class="text-xs text-white uppercase bg-gradient-to-r from-blue-700 to-blue-800 dark:bg-blue-600">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-center">Judul Buku</th>
                                <th scope="col" class="px-6 py-4 text-center">Penulis</th>
                                <th scope="col" class="px-6 py-4 text-center">Kategori</th>
                                <th scope="col" class="px-6 py-4 text-center">Status</th>
                                <th scope="col" class="px-6 py-4 text-center">Terbit</th>
                                <th scope="col" class="px-6 py-4 text-center">Jumlah Buku</th>
                                <th scope="col" class="px-6 py-4 text-center">Deskripsi</th>
                                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @forelse($books as $book)
                                <tr class="border-b dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-600 transition-all duration-300">
                                    <td class="px-6 py-4 text-center">{{ $book->judul }}</td>
                                    <td class="px-6 py-4 text-center">{{ $book->penulis }}</td>
                                    <td class="px-6 py-4 text-center">{{ $book->kategori }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($book->status && $book->jumlah > 0)
                                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded dark:bg-green-200 dark:text-green-900">Tersedia</span>
                                        @else
                                            <span class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded dark:bg-red-200 dark:text-red-900">Tidak Tersedia</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">{{ $book->tahun_terbit }}</td>
                                    <td class="px-6 py-4 text-center">{{ $book->jumlah }}</td>
                                    <td class="px-6 py-4 text-ellipsis overflow-hidden text-center">{{ $book->deskripsi }}</td>
                                    <td class="px-6 py-4 text-center flex justify-center space-x-3">
                                        <a href="{{ route('books.edit', $book->id) }}">
                                            <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 transition-all">Edit</button>
                                        </a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800 transition-all">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-gray-500 py-4">
                                        Tidak ada data buku untuk ditampilkan.
                                    </td>
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