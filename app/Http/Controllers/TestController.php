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

    /**
     * Check if a collection contains a given key value pair
     * value or callback parameter
     *
     * @return true or false
     */
    public function contains()
    {
        $users = User::all();
        $users->contains('name', 'Chasity Tillman');
        //true

        $collection = collect(['name' => 'John', 'age' => 23]);
        $collection->contains('Jane');
        //false

        $collection = collect([1, 2, 3, 4, 5]);
        $collection->contains(function ($key, $value) {
            return $value <= 5;
            //true
        });
    }
}
