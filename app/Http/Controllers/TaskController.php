<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\TaskPriorityCalculation;
use mysql_xdevapi\Exception;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'title' => 'required',
                'description' => 'required'
            ]);

            $priority_calculator = new TaskPriorityCalculation();
            $priority = $priority_calculator->calculatePriorirty($request->description);
            $data = $request->all();
            $data['priority'] = $priority;

            return Task::create($data);
        }
        catch (Exception $e){

            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $priority_calculator = new TaskPriorityCalculation();
        $priority = $priority_calculator->calculatePriorirty($request->description);
        $data = $request->all();
        $data['priority'] = $priority;

        $task->update($data);

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Task has been deleted successfully']);
    }
}
