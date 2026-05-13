<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Senarai Tugasan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="/tambah" method="POST" class="flex mb-4">
                    @csrf
                    <input type="text" name="task" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full me-2" placeholder="Tugasan baru..." required>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</button>
                </form>

                <ul class="divide-y divide-gray-200">
                    @foreach($tasks as $t)
                    <li class="py-4 flex justify-between items-center border-b border-gray-100 last:border-0">
                        <span class="{{ $t->is_done ? 'line-through text-gray-400' : 'text-gray-700 font-medium' }}">
                            {{ $t->nama_tugasan }}
                        </span>
                        
                        <div class="flex items-center space-x-4">
                            <a href="/edit/{{ $t->id }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-900 transition">
                                Edit
                            </a>

                            <form action="/check/{{ $t->id }}" method="POST">
                                @csrf
                                <button type="submit" class="text-sm font-semibold text-green-600 hover:text-green-800 transition">
                                    Selesai
                                </button>
                            </form>

                            <form action="/padam/{{ $t->id }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-sm font-semibold text-red-600 hover:text-red-800 transition">
                                    Padam
                                </button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>