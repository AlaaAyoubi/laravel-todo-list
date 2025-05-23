<?php
//app/Http/Controllers/TaskController.php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {
    // عرض جميع المهام
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    // حفظ المهمة الجديدة
    public function store(Request $request) {
        Task::create(['name' => $request->name , 'priority' => $request->priority]);
        $request->validate(['name' => 'required|min:3']);
        return redirect('/tasks');
    }

    // حذف المهمة
    public function destroy($id) {
        Task::destroy($id);
        return redirect('/tasks');
    }

    //edit form 
    public function edit($id) {
        $task = Task::find($id);
        return view ('tasks.edit', compact('task'));
    }
    public function update(Request $request,$id) {
        $task = Task::find($id);
        $request->validate(['name' => 'required|min:3']);
        $task->update(['name' => $request->name, 'priority' => $request->priority]);
        return redirect('/tasks');
    }
}