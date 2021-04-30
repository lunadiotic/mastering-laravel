<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskList = [
        'first' => 'Sleep',
        'second' => 'Eat',
        'third' => 'Work'
    ];

    public function index()
    {
        // ddd(request());

        if (request()->search) {
            return $this->taskList[request()->search];
        }

        return $this->taskList;
    }

    public function store()
    {
        $this->taskList[request()->label] = request()->task;
        return $this->taskList;
    }

    public function show($index)
    {
        return $this->taskList[$index];
    }

    public function update($key)
    {
        $this->taskList[$key] = request()->task;
        return $this->taskList;
    }

    public function destroy($key)
    {
        unset($this->taskList[$key]);
        return $this->taskList;
    }
}
