<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskList;
use App\Models\Task;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');

        // Pencarian di task_lists
        $taskLists = TaskList::where('name', 'LIKE', "%{$query}%")->get();

        // Ambil hanya list_id yang ditemukan dari taskLists
        $listIds = $taskLists->pluck('id');

        // Pencarian di tasks yang sesuai dengan query dan hanya dalam list yang ditemukan
        $tasks = Task::whereIn('list_id', $listIds)
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orwhere('description', 'LIKE', "%{$query}%");
            })->get();

        return response()->json(['taskLists' => $taskLists, 'tasks' => $tasks]);
    }
}
