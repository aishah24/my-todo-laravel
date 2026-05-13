<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#f8fafc]">
        
        <div class="mb-6">
            <a href="/">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center shadow-xl shadow-blue-200 transition-transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </div>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white shadow-[0_20px_50px_rgba(8,_112,_184,_0.07)] overflow-hidden sm:rounded-[2.5rem] border border-gray-100">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Selamat Kembali</h2>
                <p class="text-gray-500 mt-3 font-medium">Log masuk ke akaun TaskFlow anda.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-6">
                    <label class="block font-bold text-sm text-gray-700 mb-2 ml-1">Emel</label>
                    <input type="email" name="email" :value="old('email')" required autofocus 
                           class="w-full px-5 py-4 bg-gray-50 border border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100 rounded-2xl transition-all outline-none">
                </div>

                <div class="mb-6">
                    <label class="block font-bold text-sm text-gray-700 mb-2 ml-1">Kata Laluan</label>
                    <input type="password" name="password" required 
                           class="w-full px-5 py-4 bg-gray-50 border border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100 rounded-2xl transition-all outline-none">
                </div>

                <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-2xl shadow-xl shadow-blue-200 transition transform hover:-translate-y-1 active:scale-95">
                    LOG MASUK
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="{{ route('register') }}" class="text-sm text-blue-600 font-bold hover:underline">Belum ada akaun? Daftar sekarang</a>
            </div>
        </div>
    </div>
</x-guest-layout>