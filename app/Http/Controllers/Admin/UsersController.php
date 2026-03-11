<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->with('role')->latest()->get();

        return view('admin.users.index', compact('users'));
    }
}
