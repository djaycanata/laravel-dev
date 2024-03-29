<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
}
