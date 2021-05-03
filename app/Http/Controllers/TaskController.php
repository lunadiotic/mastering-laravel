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
        if ($request->search) {
            $tasks = DB::table('tasks')
                ->where('task', 'like', "%$request->search%")
                ->get();

            return $tasks;
        }

        $tasks = DB::table('tasks')->get();
        return $tasks;
    }

    public function store(Request $request)
    {
        $task = DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return $task;
    }

    public function show($id)
    {
        $task = DB::table('tasks')->find($id);
        ddd($task);
    }

    public function update(Request $request, $id)
    {
        DB::table('tasks')
            ->where('id', $id)
            ->update([
                'task' => $request->task
            ]);

        return 'success';
    }

    public function destroy($id)
    {
        DB::table('tasks')
            ->where('id', $id)
            ->delete();

        return 'success';
    }
}
