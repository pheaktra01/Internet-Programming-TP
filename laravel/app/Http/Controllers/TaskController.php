<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function show(Task $task)
    {
        // 🔐 AUTHORIZATION CHECK (Policy)
        $this->authorize('view', $task);

        // If authorized, continue
        return view('tasks.show', compact('task'));
    }
}
