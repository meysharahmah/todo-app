<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //index() → Mengambil semua daftar tugas dan tugas yang ada untuk ditampilkan di halaman utama.
    public function index()
    {
        $data = [
            'title' => 'Home',
            'taskLists' => TaskList::all(),
            'tasks' => Task::orderBy('created_at', 'desc')->get(),
            'priorities' => Task::PRIORITIES
        ];

        return view('pages.home', $data);
    }

    //store() → Menyimpan tugas baru ke database.
    public function store(Request $request)
    {
        //digunakan untuk memvalidasi data yang dikirim oleh pengguna(user)
        $request->validate([
            'name' => 'required|max:100',
            'deskripsi' => 'max:255',
            'priority' => 'required|in:low,medium,high',
            'list_id' => 'required'
        ]);

        Task::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);


        return redirect()->back();
    }

    //complete() → Menandai tugas sebagai selesai (is_completed = true).
    public function complete($id)
    {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    //destroy() → Menghapus tugas berdasarkan ID.
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('home');
    }

    public function show($id)
    {
        $data = [
            'title' => 'Task',
            'lists' => TaskList::all(),
            'task' => Task::findOrFail($id),
        ];

        return view('pages.details', $data);
    }

    public function changeList(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high'
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}
