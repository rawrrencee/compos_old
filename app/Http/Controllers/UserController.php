<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{

    public function getUsersPaginated()
    {
        return Inertia::render('Users/Employees', ['users' => User::paginate(10)]);
    }

    public function getUser($id)
    {
        return Inertia::render('Users/Employees', ['data' => User::find($id)]);
    }
}
