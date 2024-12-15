<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
$tasks=Task::all();
        return view('Tdhome.homepage',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addtask');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required|string|max:255',
           'date_time' => 'required|date',
        ]);

        $task=new Task();
        $task->description= $request->description;
        $task->date_time= $request->date_time;
        $task->is_done=0;
        $task->save();

      return redirect()->route('task.index')->with('success', 'Task added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->is_done = 1;
        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.index');
    }
}
