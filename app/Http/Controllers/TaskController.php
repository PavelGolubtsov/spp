<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getOrder = DB::select(DB::raw(
            'select * from priority_task inner join status_task
            on priority_task.task_id = status_task.task_id
            ORDER BY status_id ASC, priority_id ASC'
        ));

        $tasks = Task::get();
        
        return view('task.index', compact('getOrder', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = Priority::get();

        return view('task.create', compact('priorities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'priority_id' => 'required',
        ]);

        $task = Task::create($data);
        $task->priorities()->attach($data['priority_id']);
        $task->statuses()->attach(1);

        return redirect()->back()->withSuccess('Задание создано!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $priorities = Priority::get();
        $statuses = Status::get();

        return view('task.edit', compact('task', 'priorities', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'priority_id' => 'required',
            'status_id' => 'required',
        ]);
        
        $task->update($data);
        $task->priorities()->detach($data['priority_id']);
        $task->statuses()->detach($data['status_id']);
        $task->priorities()->attach($data['priority_id']);
        $task->statuses()->attach($data['status_id']);
        $task->priorities()->sync($data['priority_id']);
        $task->statuses()->sync($data['status_id']);

        return redirect()->back()->withSuccess('Задание обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back()->withSuccess('Категория удалена!');
    }
}
