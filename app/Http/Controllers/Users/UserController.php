<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard()
    {
        $task = Task::where("uid", Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('user.task-list')->with('task', $task);
    }
    public function addNewTask()
    {
        return view('user.add-new-task');
    }
    public function submitNewTask(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' =>  'mimes:png,jpg,jpeg'
        ]);

        $uid = Auth::user()->id;
        $data = Task::create([
            'uid'=> $uid,
            'title'=> $request->title,
            'description'=> $request->description,
        ]);
        if($request->hasFile('image'))
        {
            $data->addMediaFromRequest('image')
             ->usingName($request->title)
             ->toMediaCollection();
        }
        return redirect()->route('user.dashboard')->with('msg', 'New Task added successfully');
    }
    public function editTask($id)
    {
        $data = Task::find($id);
        return view('user.edit-task')->with('data', $data);
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
        return redirect()->route('user.dashboard')->with('updateMsg', 'Task updated successfully');
    }
    public function deleteTask(Request $request, $id)
    {
        $delete = Task::find($id)->delete();
        return redirect()->back()->with('dltMsg', 'Task deleted successfully');
    }
}
