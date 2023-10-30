<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function userTaskList()
    {
        $task = Task::all();
        return response()->json([$task]);
    }
    public function addTask(Request $request)
    {
        $data = Task::create([
            'uid'=> 1,
            'title'=> $request->title,
            'description'=> $request->description,
        ]);
        if($request->hasFile('image'))
        {
            $data->addMediaFromRequest('image')
             ->usingName($request->title)
             ->toMediaCollection();
        }
        return response()->json("Task added successfully");
    }
    public function updateTask(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' =>  'mimes:png,jpg,jpeg'
        ]);
        Task::where('id', $id)->update([
            'title'=> $request->title,
            'description'=> $request->description
        ]);

        $update = Task::find($id);
        if($request->hasFile('image'))
        {
            $update->clearMediaCollection();
            $update->addMediaFromRequest('image')
             ->usingName($request->title)
             ->toMediaCollection();
        }
        return response()->json('Task updated successfully');
    }
    public function deleteTask($id)
    {
        $task = Task::find($id)->delete();
        return response()->json('Task deleted successfully');
    }
}
