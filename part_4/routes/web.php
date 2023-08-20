<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class)->except('show');
    Route::get('/', function () {
        return redirect('tasks');
    });
});

Auth::routes();
