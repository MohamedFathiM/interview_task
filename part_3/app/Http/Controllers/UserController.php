<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request, User $user)
    {
        $imagePath =  $request->file('image')->storePublicly('users');
        $user->fill($request->validated() + ['image' => $imagePath])->save();

        return back()->with('success', 'Created Successfully');
    }
}
