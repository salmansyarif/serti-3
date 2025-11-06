<x-app-layout>
<section class="bg-blue-700 min-h-screen py-8 antialiased dark:bg-gray-900 md:py-12 lg:pl-64">






        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <!-- Heading -->
            <div class="m-5 flex items-center justify-center space-y-4 sm:space-y-0">
    <h1 class="text-3xl font-extrabold text-white">
        Daftar Buku
    </h1>
</div>

            <!-- Cards Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($books as $book)
                    <!-- Card -->
                    <div
                        class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="block">
                            <h5 class="text-xl font-bold text-gray-900 dark:text-white">
                                JUDUL BUKU : <br>{{ $book->judul }}
                            </h5>
                        </a>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">
                            NAMA PENULIS: {{ $book->penulis }}
                        </p>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">
                            KATEGORI: {{ $book->kategori }}
                        </p>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">
                            STOCK: {{ $book->jumlah }}
                        </p>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 mt-1">
                            STATUS:
                            <span
                                class="font-medium px-2 py-1 {{ $book->status ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                STATUS :{{ $book->status ? 'TERSEDIA' : 'TIDAK TERSEDIA' }}
                            </span>
                        </p>
                        <!-- Modal Toggle Button -->

                        @if ($book->status == '1' && $book->jumlah > 0)
                        <button data-modal-target="modal-{{ $book->id }}"
                            data-modal-toggle="modal-{{ $book->id }}"
                            <span class="w-full text-center mt-5 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Pinjam</span>
                        </button>
                        @endif

                        <!-- Modal -->
                        <div id="modal-{{ $book->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                            <div class="relative w-full max-w-md p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                                <!-- Modal Header -->
                                <div class="flex justify-between items-center border-b pb-3 dark:border-gray-600">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Isi Form Peminjaman Buku
                                    </h4>
                                    <button type="button" data-modal-hide="modal-{{ $book->id }}"
                                        class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Modal Body -->
                                <div class="mt-4">
                                    <form action="{{ route('anggota.store') }}" method="POST" class="space-y-4">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">

                                        <!-- Nama Anggota -->
                                        <div>
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700 dark:text-white">Nama
                                                Anggota</label>
                                            <input type="text" id="name" name="name"
                                                value="{{ auth()->user()->name }}" readonly
                                                class="w-full mt-1 p-2.5 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                        </div>

                                        <!-- Judul Buku -->
                                        <div>
                                            <label for="judul"
                                                class="block text-sm font-medium text-gray-700 dark:text-white">Judul
                                                Buku</label>
                                            <input type="text" id="judul" name="judul"
                                                value="{{ $book->judul}}" readonly
                                                class="w-full mt-1 p-2.5 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                        </div>

                                        <!-- Grid: Penulis & Kategori -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label for="penulis"
                                                    class="block text-sm font-medium text-gray-700 dark:text-white">Penulis</label>
                                                <input type="text" id="penulis" name="penulis"
                                                    value="{{ $book->penulis }}" readonly
                                                    class="w-full mt-1 p-2.5 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            </div>
                                            <div>
                                                <label for="kategori"
                                                    class="block text-sm font-medium text-gray-700 dark:text-white">Kategori</label>
                                                <input type="text" id="kategori" name="kategori"
                                                    value="{{ $book->kategori }}" readonly
                                                    class="w-full mt-1 p-2.5 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            </div>
                                        </div>

                                        <!-- Grid: Tanggal Pinjam & Kembali -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label for="tanggal_pinjam"
                                                    class="block text-sm font-medium text-gray-700 dark:text-white">Tanggal
                                                    Pinjam</label>
                                                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required
                                                    class="w-full mt-1 p-2.5 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white ">
                                            </div>
                                            <div>
                                                <label for="tanggal_kembali"
                                                    class="block text-sm font-medium text-gray-700 dark:text-white">Tanggal
                                                    Kembali</label>
                                                <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                                                    required
                                                    class="w-full mt-1 p-2.5 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            </div>
                                        </div>

                                        <!-- Submit Button -->

                                        <button type="submit"
                                            class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                            <span
                                                class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                PINJAM BUKU
                                            </span> 
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
