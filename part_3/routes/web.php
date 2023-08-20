<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'create']);
Route::post('/', [UserController::class, 'store'])->name('users.store');
