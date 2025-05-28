<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // ✅ Ambil semua tugas milik user
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return response()->json($tasks);
    }

    // ✅ Simpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'priority' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $task = Task::create([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
            'priority'    => $request->priority,
            'deadline'    => $request->deadline,
        ]);

        return response()->json($task, 201);
    }

    // ✅ Tampilkan detail tugas
    public function show($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$task) {
            return response()->json(['message' => 'Tugas tidak ditemukan'], 404);
        }

        return response()->json($task);
    }

    // ✅ Update tugas
    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$task) {
            return response()->json(['message' => 'Tugas tidak ditemukan'], 404);
        }

        $task->update($request->all());
        return response()->json($task);
    }

    // ✅ Hapus tugas
    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$task) {
            return response()->json(['message' => 'Tugas tidak ditemukan'], 404);
        }

        $task->delete();
        return response()->json(['message' => 'Tugas berhasil dihapus']);
    }
}
