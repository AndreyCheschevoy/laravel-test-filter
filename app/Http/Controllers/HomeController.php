<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::select('name', 'email', 'gender', 'status', 'age')->get();

        $filters = User::distinct('age')->pluck('age')->sort();

        return view('welcome', compact('users', 'filters'));
    }
}
