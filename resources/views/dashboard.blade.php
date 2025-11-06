<x-app-layout>
    <html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    </head>
    
    <body class="bg-gradient-to-r from-blue-900 to-blue-800 font-roboto" style="margin-left: 250px">
        <!-- Fixed Header Section -->
        <div class="p-6 bg-gradient-to-r from-blue-950 to-blue-900 rounded-lg shadow-2xl">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
            
                <div class="flex items-center space-x-4 text-white">
                <p>{{ now()->format('l, d M Y | H:i') }}</p>

                    <i class="fas fa-clock"></i>
                    <i class="fas fa-user-circle"></i>
                </div>
            </div>
        </div>

        <!-- Main Container to Stretch -->
        <div class="min-h-screen p-6 bg-gradient-to-r from-blue-950 to-blue-900 rounded-lg shadow-2xl">
            <!-- Dashboard Info Section (Selamat Datang) -->

            @if (Auth::user()->role =='admin')
            <div class="bg-gradient-to-r from-blue-700 to-blue-600 rounded-lg shadow-lg p-6 mb-6">
                <div class="flex items-center mb-6 ml-44">
                    <img alt="" class="w-1/2 sm:w-3 lg:w-2/5" height="200" src="images/portal.png" />
                    <div class="ms-20 text-white">
                        <h1 class="text-3xl font-bold mb-3">Selamat Pagi, {{Auth::user()->name}}!</h1>
                        <p class="text-gray-100 mb-4"> Selamat Datang DI Perpustakaan Online <br>  Di Sini Tempat Buku Dari Penjuru Dunia</p>
                       
                        <div class="flex space-x-4">
                            <!-- Tombol Baca Buku dengan warna kontras -->
                            <a href="{{route('admin.loanHistory')}}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-800">
                                Riwayat Pinjam
                            </a>
                            <a href="{{route('books.create')}}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-800">
                                Tambah Buku
                            </a>
                            <a href="{{route('books.index')}}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-800">
                                Daftar Buku
                            </a>
                        </div>
                    </div>
                </div>
            </div>      
            @endif


            @if (Auth::user()->role =='anggota')
            <div class="bg-gradient-to-r from-blue-700 to-blue-600 rounded-lg shadow-lg p-6 mb-6">
                <div class="flex items-center mb-6 ml-44">
                    <img alt="" class="w-1/2 sm:w-3 lg:w-2/5" height="200" src="images/portal.png" />
                    <div class="ms-20 text-white">
                        <h1 class="text-3xl font-bold mb-3">Selamat Pagi, {{Auth::user()->name}}!</h1>
                        <p class="text-gray-100 mb-4"> Selamat Datang DI Perpustakaan Online <br>  Di Sini Tempat Buku Dari Penjuru Dunia</p>
                       
                        <div class="flex space-x-4">
                            <!-- Tombol Baca Buku dengan warna kontras -->
                            <a href="{{route('anggota.create')}}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-800">
                                Riwayat Pinjam
                            </a>
                            <a href="{{route('anggota.index')}}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-800">
                                Pinjam Buku
                            </a>
                           
                        </div>
                    </div>
                </div>
            </div>      
            @endif

            <!-- Info Cards Section -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <!-- Total Buku Card -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-800 bg-opacity-30">
                            <i class="fas fa-book text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-white">Total Buku</p>
                            <p class="text-2xl font-semibold text-white">{{ $totalBooks ?? '0' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Buku Tersedia Card -->
                <div class="bg-gradient-to-r from-green-600 to-green-500 rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-800 bg-opacity-30">
                            <i class="fas fa-check-circle text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-white">Buku Tersedia</p>
                            <p class="text-2xl font-semibold text-white">{{ $availableBooks ?? '0' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Buku Tidak Tersedia Card -->
                <div class="bg-gradient-to-r from-red-600 to-red-500 rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-800 bg-opacity-30">
                            <i class="fas fa-times-circle text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-white">Buku Tidak Tersedia</p>
                            <p class="text-2xl font-semibold text-white">{{ $unavailableBooks ?? '0' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <br> <br> <br>
            
            <!-- Info Dashboard Buku Section -->
        </div>
    </body> 
    </html>
</x-app-layout>
