<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="min-h-screen bg-[#f3f4f6] py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Senarai Tugasan Saya</h2>
                <p class="text-gray-500 mt-2">Urus aktiviti harian anda dengan lebih teratur.</p>
            </div>

            <div class="bg-white rounded-[2rem] shadow-xl p-8 mb-8 border border-gray-100">
                <form action="{{ route('todo.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input type="text" name="title" required 
                               placeholder="Apa rancangan anda hari ini?" 
                               class="flex-1 px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none text-gray-700">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-4 rounded-2xl shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1">
                            SUBMIT
                        </button>
                    </div>
                </form>
            </div>

            <div class="space-y-4">
                @forelse($todos as $todo)
                <div class="bg-white p-6 rounded-[1.5rem] shadow-sm border border-gray-50 flex items-center justify-between hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="w-3 h-3 rounded-full {{ $todo->is_completed ? 'bg-green-400' : 'bg-blue-400' }}"></div>
                        <span class="text-lg font-medium {{ $todo->is_completed ? 'line-through text-gray-400' : 'text-gray-700' }}">
                            {{ $todo->title }}
                        </span>
                    </div>

                    <div class="flex gap-2">
                        <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="p-2 text-green-600 hover:bg-green-50 rounded-xl transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                        </form>

                        <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-xl transition" onclick="return confirm('Padam?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <p class="text-gray-400">Tiada tugasan ditemui. Mulakan sekarang!</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>