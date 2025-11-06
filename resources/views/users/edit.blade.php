<!-- resources/views/users/edit.blade.php -->
<x-app-layout>
    <section class="bg-blue-800 min-h-screen p-5">
        <div class="mx-auto max-w-screen-lg px-4 lg:px-12">

            <!-- Form Section -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('email', $user->email) }}" required>
                    </div>

 <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('password', $user->password) }}" required>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex justify-center sm:justify-start">
                        <button type="submit" class="inline-flex items-center bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-lg text-sm px-6 py-3 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-200 ease-in-out">
                            Update Anggota
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</x-app-layout>
