<?php

namespace App\Http\Controllers;

use App\Help\Services;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TaskController extends Controller
{
    // Display all tasks
    public function tasks()
    {
        // load tasks from the database
        $tasks = Task::where('user_id', session('user')->id)->get()->toArray();
        return view('tasks.index', ['tasks' => $tasks]); // Assuming you have a view named 'tasks.index'
    }
    // Show form to create a new task
    public function createTask()
    {
        // Logic to show the task creation form
        return view('tasks.create'); // Assuming you have a view named 'tasks.create'
    }

    // Store a new task
    public function storeTask(Request $request)
    {
        // check if the request is valid
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'due_date' => 'required|date',
                'priority' => 'required|string|in:low,medium,high',
            ],
            [
                'title.required' => 'O campo título é obrigatório.',
                'title.string' => 'O título deve ser um texto.',
                'title.max' => 'O título não pode ter mais de 255 caracteres.',
                'description.required' => 'O campo descrição é obrigatório.',
                'description.string' => 'A descrição deve ser um texto.',
                'description.max' => 'A descrição não pode ter mais de 1000 caracteres.',
                'due_date.required' => 'O campo data de vencimento é obrigatório.',
                'due_date.date' => 'A data de vencimento deve ser uma data válida.',
                'priority.required' => 'O campo prioridade é obrigatório.',
                'priority.in' => 'A prioridade deve ser uma das seguintes: baixa, média, alta.',
            ]
        );

        // Create a new task instance and save it
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->priority = $request->input('priority');

        // get the user ID from the authenticated user
        $task->user_id = session('user')->id; // Assuming you store user ID in session after login
        $task->save();

        // verify if the task was created successfully
        if (!$task) {
            return redirect()->back()->with('error', 'Failed to create task. Please try again.');
        }

        return redirect()->route('tasks')->with('success', 'Task created successfully!');
    }

    // Show form to edit an existing task
    public function editTask($id)
    {

        // find the task by ID
        $id = Services::decrypt($id);
        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks')->with('error', 'Task not found.');
        }
        return view('tasks/edit', ['task' => $task]);
    }

    // Update an existing task
    public function updateTask(Request $request, $id)
    {
        // check if the request is valid
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'due_date' => 'nullable|date',
            'priority' => 'nullable|string|in:low,medium,high',
        ]);
        $id = Services::decrypt($id);
        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('home')->with('error', 'Task not found.');
        }
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->priority = $request->input('priority');
        $task->save();
        return redirect()->route('tasks')->with('success', 'Task updated successfully!');
    }

    // Delete a task
    public function deleteTask($id)
    {
        // decrypt the ID
        $id = Services::decrypt($id);
        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks')->with('error', 'Task not found.');
        }
        $task->delete();
        return redirect()->route('tasks')->with('success', 'Task deleted successfully!');
    }
}
