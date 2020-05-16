<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $allUsers = User::select('name', 'email', 'gender', 'status', 'age', 'hobby');
        $users = (new UserFilter($allUsers, $request))->apply()->get();

        $userForFilter = Cache::remember('users', 1440, function () {
            return User::all();
        });
        $filters_age = collect($userForFilter)->pluck('age')->unique()->sort();
        $filters_hobby = collect($userForFilter)->pluck('hobby')->unique()->sort();

        if ($request->expectsJson()){
            return response()->json([
                'users' => $users,
                'hobby' => $filters_hobby,
                'age' => $filters_age,
            ]);
        }

        $request->flash();

        return view('welcome', compact('users', 'filters_age', 'filters_hobby'));
    }
}
