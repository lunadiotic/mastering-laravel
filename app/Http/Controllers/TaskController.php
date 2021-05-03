<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $taskList = [
        'first' => 'Sleep',
        'second' => 'Eat',
        'third' => 'Work'
    ];

    public function index(Request $request)
    {
        // ddd(request());

        if ($request->search) {
            return $this->taskList[$request->search];
        }

        return $this->taskList;
    }

    public function store(Request $request)
    {
        $task = DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return $task;
    }

    public function show($index)
    {
        return $this->taskList[$index];
    }

    public function update(Request $request, $key)
    {
        $this->taskList[$key] = $request->task;
        return $this->taskList;
    }

    public function destroy($key)
    {
        unset($this->taskList[$key]);
        return $this->taskList;
    }
}
