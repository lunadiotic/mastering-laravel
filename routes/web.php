<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    // return [
    //     'message' => 'Hello, World'
    // ];

    return response()->json([
        'message' => 'Hello, world'
    ], 201);
});

Route::get('/debug', function () {
    // dd([
    //     'message' => 'hello, world'
    // ]);
    ddd([
        'message' => 'hello, world'
    ]);
});

$taskList = [
    'first' => 'Sleep',
    'second' => 'Eat',
    'third' => 'Work'
];

Route::get('task', function () use ($taskList) {
    ddd(request());

    if (request()->search) {
        return $taskList[request()->search];
    }

    return $taskList;
});

Route::get('/task/{index}', function ($index) use ($taskList) {
    return $taskList[$index];
});
