<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tugasan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="/kemaskini/{{ $task->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="task" value="{{ $task->nama_tugasan }}" 
                           class="w-full border-gray-300 rounded-md shadow-sm mb-4">
                    
                    <div class="flex space-x-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
                        <a href="/dashboard" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>