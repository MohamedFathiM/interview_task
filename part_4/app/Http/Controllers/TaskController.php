<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create(Task $task)
    {
        return view('tasks.create', compact('task'));
    }

    public function store(TaskRequest $request, Task $task)
    {
        $task->fill($request->validated() + ['user_id' => auth()->id()])->save();

        return redirect(route('tasks.index'))->with('success', 'Saved Successfully');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $isDone = 0;
        if (!$request->is_done) $isDone = 0;

        $task->fill($request->validated() + ['is_done' => $isDone])->save();

        return redirect(route('tasks.index'))->with('success', 'Saved Successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
