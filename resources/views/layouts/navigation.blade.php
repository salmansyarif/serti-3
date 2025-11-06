<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
       <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
   <div class="overflow-y-auto py-5 px-3 h-full bg-gradient-to-r from-blue-700 to-blue-600 rounded-lg shadow-lg p-6 mb-6 border-r border-gray-200 dark:border-gray-700">
       <ul class="space-y-2">
           <li>
               <a href="{{route('dashboard')}}" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-blue-500 group">
                   <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                   <span class="ml-3">Beranda</span>
               </a>
           </li>


            @if (Auth::user()->role =='admin')

           <li>
               <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500" aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                   <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                   <span class="flex-1 ml-3 text-left whitespace-nowrap">Buku</span>
                   <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
               </button>
               <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                   <li>
                       <a href="{{route('books.create')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500">Tambah Buku</a>
                   </li>
                   <li>
                       <a href="{{route('books.index')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500">Lemari Buku</a>
                   </li>
                   <li>
                       <a href="{{route('admin.loanHistory')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500">Informasi</a>
                   </li>
               </ul>
           </li>
           <li>
               <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500" aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                   <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                   <span class="flex-1 ml-3 text-left whitespace-nowrap">Users</span>
                   <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
               </button>
               <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                       <li>
                           <a href="{{route('users.index')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500">Anggota</a>
                       </li>
               </ul>
           </li>

          @endif

          @if (Auth::user()->role =='anggota')

          <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500" aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap">Buku</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                <li>
                    <a href="{{route('anggota.create')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500">Riwayat Pinjam Buku</a>
                </li>
                <li>
                    <a href="{{route('anggota.index')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-500">Lemari Buku</a>
                </li>
              
            </ul>
        </li>
@endif

          
       </ul>
       <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
   

           <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                        <span class="ml-3 flex items-center p-2 text-base font-normal text-white rounded-lg transition duration-75 hover:bg-blue-500 group">Keluar</span>
                </button>
              </form>
        </li>

       </ul>
   </div>
 
 </aside>