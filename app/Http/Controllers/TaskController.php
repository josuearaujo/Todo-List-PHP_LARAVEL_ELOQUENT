<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'asc')->get();

        return view('tasks.index')->with('storedTasks', $tasks)->with('mode', 1);
    }

    public function loadView($mode){
        if($mode == 1){
            $tasks = Task::orderBy('id', 'asc')->get();
        } elseif($mode == 2){
            $tasks = Task::orderBy('id', 'asc')->where('status', 1)->get();
        } elseif($mode == 3){
            $tasks = Task::orderBy('id', 'asc')->where('status', 0)->get();
        } else{
            Return "Invalid mode";
        }

        return view('tasks.index')->with('storedTasks', $tasks)->with('mode', $mode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $mode)
    {
        $this->validate($request, [
            'newTaskName' => 'required|min:5|max:255',
        ]);

        $task = new Task;

        $task->name = $request->newTaskName;
        $task->status = 1;

        $task->save();

        return redirect()->route('tasks.loadView', $mode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $mode)
    {
        $currentName = (Task::find($id))->name;
        return view('tasks.edit', compact('id', 'currentName', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $mode)
    {

        $updatedTask = Task::find($id);

        $updatedTask->name = $request->nameEdited;

        $updatedTask->save();

        return redirect()->route('tasks.loadView', $mode);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $mode)
    {
        if($id==0){
            Task::where('status', 0)->delete();
            return redirect()->route('tasks.loadView', $mode);
        }
        else{
            Task::destroy($id);
            return redirect()->route('tasks.loadView', $mode);
        }

    }
        

    public function changeStatus($id, $mode){
        $task = Task::find($id);

        $task->status = ($task->status ? 0 : 1);

        $task->save();

        return redirect()->route('tasks.loadView', $mode);
    }
}
