<x-guest-layout>
    <!-- Status Session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Kontainer Form Login (Background Transparan) -->
    <div class="p-6 rounded-xl shadow-lg w-full max-w-sm text-center">
   

        <!-- Gambar Header -->
        <div class="mb-4">
            <img src="images/logo.png" alt="Login Illustration" class="w-40 h-40 mx-auto rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-white mt-3">Selamat Datang </h1>
            <p>Silahkan Isi Form Sebelum Login</p>
        </div>

        <!-- Menampilkan Pesan Error jika Login Gagal -->
        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <p>{{ __('Email atau Password Salah.') }}</p>
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-white text-sm" />
                <x-text-input id="email" class="block w-full px-4 py-2 text-white bg-opacity-60 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-white text-sm" />
                <x-text-input id="password" class="block w-full px-4 py-2 text-white bg-opacity-60 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-start mb-2 text-xs">
                <label for="remember_me" class="inline-flex items-center text-white">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500" name="remember">
                </label>
                <span class="ml-1 mb-4">{{ __('Ingat saya') }}</span>
            </div>

            <!-- Aksi -->
            <div class="flex justify-center mb-6">
                <x-primary-button class="py-2 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all text-sm w-full max-w-xs">
                    {{ __('------------Masuk------------') }}
                </x-primary-button>
            </div>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <div class="text-center mt-4">
                    <a class="text-sm text-gray-200 hover:text-white" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</x-guest-layout>
 @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif