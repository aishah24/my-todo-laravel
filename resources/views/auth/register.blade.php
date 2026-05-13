<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#f8fafc]">
        
        <div class="mb-6">
            <a href="/">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center shadow-xl shadow-blue-200 transition-transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white shadow-[0_20px_50px_rgba(8,_112,_184,_0.07)] overflow-hidden sm:rounded-[2.5rem] border border-gray-100">
            
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Daftar Akaun Baru</h2>
                <p class="text-gray-500 mt-3 font-medium">Sertai TaskFlow dan mula urus tugasan anda.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block font-bold text-sm text-gray-700 mb-2 ml-1">Nama Penuh</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                           class="w-full px-5 py-4 bg-gray-50 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100 rounded-2xl transition-all duration-200 outline-none text-gray-700" 
                           placeholder="Masukkan nama anda">
                    @if($errors->has('name'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="email" class="block font-bold text-sm text-gray-700 mb-2 ml-1">Emel</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                           class="w-full px-5 py-4 bg-gray-50 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100 rounded-2xl transition-all duration-200 outline-none text-gray-700" 
                           placeholder="nama@contoh.com">
                    @if($errors->has('email'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="password" class="block font-bold text-sm text-gray-700 mb-2 ml-1">Kata Laluan</label>
                    <input id="password" type="password" name="password" required 
                           class="w-full px-5 py-4 bg-gray-50 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100 rounded-2xl transition-all duration-200 outline-none text-gray-700" 
                           placeholder="••••••••">
                    @if($errors->has('password'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="mb-10">
                    <label for="password_confirmation" class="block font-bold text-sm text-gray-700 mb-2 ml-1">Sahkan Kata Laluan</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                           class="w-full px-5 py-4 bg-gray-50 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100 rounded-2xl transition-all duration-200 outline-none text-gray-700" 
                           placeholder="••••••••">
                </div>

                <button type="submit" 
                        class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-2xl shadow-xl shadow-blue-200 transition duration-300 transform hover:-translate-y-1 active:scale-95 tracking-widest text-sm uppercase">
                    DAFTAR SEKARANG
                </button>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500">
                        Dah ada akaun? 
                        <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline ml-1">Log masuk di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>