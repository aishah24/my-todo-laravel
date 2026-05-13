<?php

namespace App\Http\Controllers;

use App\Models\Task; // Pastikan model Task wujud
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Paparkan senarai tugasan di Dashboard
     */
    public function index()
    {
        // Ambil tugasan milik user yang sedang login sahaja
        $todos = Auth::user()->tasks()->latest()->get(); 
        
        return view('dashboard', compact('todos'));
    }

    /**
     * Simpan tugasan baru
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255', // Mesti sepadan dengan $fillable
    ]);

    auth()->user()->tasks()->create([
        'title' => $request->title,
        'is_completed' => false,
    ]);

    return redirect()->back();
}

    /**
     * Tanda tugasan sebagai selesai/belum selesai
     */
    public function check($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->update([
            'is_completed' => !$task->is_completed
        ]);

        return redirect()->back();
    }

    /**
     * Papar halaman edit
     */
    public function edit($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        return view('edit', compact('task'));
    }

    /**
     * Simpan kemaskini tugasan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Auth::user()->tasks()->findOrFail($id);
        $task->update([
            'title' => $request->title
        ]);

        return redirect()->route('dashboard')->with('success', 'Tugasan dikemaskini!');
    }

    /**
     * Padam tugasan
     */
    public function destroy($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Tugasan dipadam!');
    }
}