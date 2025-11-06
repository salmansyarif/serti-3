<x-app-layout>
    <section class="bg-gradient-to-r from-blue-900 to-blue-800 dark:bg-gray-900 min-h-screen">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-2xl font-bold text-white text-center">Tambah Buku</h2>
            <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6 sm:grid-cols-2 sm:gap-8">
                    <div class="sm:col-span-2">
                        <label for="judul" class="block mb-2 text-sm font-medium text-white">Judul Buku</label>
                        <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-lg focus:outline-none transition-all" placeholder="Judul Buku" required="">
                    </div>

                    <div>
                        <label for="penulis" class="block mb-2 text-sm font-medium text-white">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-lg focus:outline-none transition-all" placeholder="Penulis" required="">
                    </div>
    
                    <div>
                        <label for="kategori" class="block mb-2 text-sm font-medium text-white">Kategori</label>
                        <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-lg focus:outline-none transition-all">
                            <option value="Novel">Novel</option>
                            <option value="Fiksi">Fiksi</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Sejarah">Sejarah</option>
                            <option value="Biografi">Biografi</option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-white">Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-lg focus:outline-none transition-all">
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                   
                    <div>
                        <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-white">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-lg focus:outline-none transition-all" placeholder="Tahun Terbit" required="">
                    </div>

                    <div>
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-white">Jumlah Buku</label>
                        <input type="number" name="jumlah" id="jumlah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-lg focus:outline-none transition-all" placeholder="Jumlah Buku" required="">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-white">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="8" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-lg focus:outline-none transition-all" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-6 py-3 mt-6 sm:mt-8 text-sm font-medium text-center text-white bg-gradient-to-r from-blue-700 to-blue-800 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-gradient-to-l hover:from-blue-800 hover:to-blue-900 transition-all">
                    Tambah Buku
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
