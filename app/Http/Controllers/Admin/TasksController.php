<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $pending = Task::with('lead')
            ->where('completed', false)
            ->orderByRaw('due_date IS NULL, due_date ASC')
            ->get();

        $completed = Task::with('lead')
            ->where('completed', true)
            ->orderBy('completed_at', 'desc')
            ->limit(20)
            ->get();

        $stats = [
            'total'     => Task::count(),
            'due_today' => Task::where('completed', false)->whereDate('due_date', today())->count(),
            'overdue'   => Task::where('completed', false)->whereDate('due_date', '<', today())->count(),
            'completed' => Task::where('completed', true)->count(),
        ];

        $leads = Lead::orderBy('name')->pluck('name', 'id');

        return view('admin.tasks.index', compact('pending', 'completed', 'stats', 'leads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'lead_id'     => 'nullable|exists:leads,id',
        ]);

        Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'due_date'    => $request->due_date,
            'lead_id'     => $request->lead_id ?: null,
            'created_by'  => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Task added');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'lead_id'     => 'nullable|exists:leads,id',
        ]);

        $task->update([
            'title'       => $request->title,
            'description' => $request->description,
            'due_date'    => $request->due_date,
            'lead_id'     => $request->lead_id ?: null,
        ]);

        return redirect()->back()->with('success', 'Task updated');
    }

    public function toggle(Task $task)
    {
        $task->update([
            'completed'    => !$task->completed,
            'completed_at' => $task->completed ? null : now(),
        ]);

        if (request()->expectsJson()) {
            return response()->json([
                'success'       => true,
                'completed'     => $task->completed,
                'pending_count' => Task::where('completed', false)->count(),
                'message'       => $task->completed ? 'Task marked complete' : 'Task reopened',
            ]);
        }

        return redirect()->back()->with('success', $task->completed ? 'Task marked complete' : 'Task reopened');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted');
    }
}
