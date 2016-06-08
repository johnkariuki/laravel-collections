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

    /**
     * Use the where method to find data that matches a given
     * criteria.
     *
     * Chain the methods for fine-tuned criteria
     */
    public function where()
    {
        $users = User::all();
        $user = $users->where('id', 2);
        //Collection of user with an ID of 2

        $user = $users->where('id', 1)
                      ->where('age', '51')
                      ->where('name', 'Chasity Tillman');

        //collection of user with an id of 1, age 51
        //and named Chasity Tillman
    }

    /**
     * Use the filter method to get a list of all the users that
     * are below the age of 35.
     */
    public function filter()
    {
        $users = User::all();
        $youngsters = $users->filter(function ($user, $key) {
            return $user->age < 35;
        });

        $youngsters->all();
        //list of all users that are below the age of 35
    }
}
