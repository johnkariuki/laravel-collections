<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\User;

class TestController extends Controller
{
    /**
     * Create a new collection using the collect helper method.
     */
    public function helperCollection()
    {
        $newCollection = collect([1, 2, 3, 4, 5]);
        dd($newCollection);
    }

    /**
     * Create a new collection with a Collection class instance.
     */
    public function classCollection()
    {
        $newCollection = new Collection([1, 2, 3, 4, 5]);
        dd($newCollection);
    }

    /**
     * Get a list of users from the users table
     */
    public function getUsers()
    {
        $users = User::all();
        dd($users);
    }

    /**
     * Get the name of the first user
     */
    public function firstUser()
    {
        $user = User::first();
        dd($user->name);
    }
}
