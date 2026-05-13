<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class TaskController extends Controller
{
    // Papar Dashboard
    public function index() {
        $tasks = Task::where('user_id', auth()->id())->get();
        return view('dashboard', compact('tasks'));
    }

    // Tambah Tugasan
    public function store(Request $request) {
        $task = new Task;
        $task->nama_tugasan = $request->task;
        $task->user_id = auth()->id(); 
        $task->save();
        return redirect('/dashboard');
    }

    // Padam Tugasan
    public function destroy($id) {
        // Cari task milik user yang login sahaja untuk keselamatan
        $task = Task::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $task->delete();
        return redirect('/dashboard');
    }

    // Papar Halaman Edit
    public function edit($id) {
        // firstOrFail() akan keluar error 404 kalau task tu bukan milik user yang login
        $task = Task::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('edit', compact('task'));
    }

    // Simpan Perubahan Edit
    public function update(Request $request, $id) {
        $task = Task::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $task->nama_tugasan = $request->task;
        $task->save();

        return redirect('/dashboard')->with('success', 'Tugasan dikemaskini!');
    }

    // Tandakan Selesai/Belum Selesai
    public function check($id) {
        $task = Task::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $task->is_done = !$task->is_done;
        $task->save();
        return redirect('/dashboard');
    }
}