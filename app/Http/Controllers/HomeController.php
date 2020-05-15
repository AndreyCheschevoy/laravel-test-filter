<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $allUsers = User::select('name', 'email', 'gender', 'status', 'age');
        $users = (new UserFilter($allUsers, $request))->apply()->get();

        $filters = User::distinct('age')->pluck('age')->sort();

        return view('welcome', compact('users', 'filters'));
    }
}
