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

    /**
     * The sort methods takes a key or callback function parameter
     * which is used to sort a collection.
     */
    public function sortData()
    {
        $users  = User::all();

        $youngestToOldest = $users->sortBy('age');
        $youngestToOldest->all();
        //list of all users from youngest to oldest

        $movies = collect([
            [
                'name' => 'Back To The Future',
                'releases' => [1985, 1989, 1990]
            ],
            [
                'name' => 'Fast and Furious',
                'releases' => [2001, 2003, 2006, 2009, 2011, 2013, 2015, 2017]
            ],
            [
                'name' => 'Speed',
                'releases' => [1994]
            ]
        ]);

        $mostReleases = $movies->sortByDesc(function ($movie, $key) {
            return count($movie['releases']);
        });

        $mostReleases->toArray();
        //list of movies in descending order of most releases.

        dd($mostReleases->values()->toArray());
        /*
            list of movies in descending order of most releases
            but with the key values reset
        */
    }

    /**
     * groupBy returns data grouped based on a key or callback function
     * logic
     */
    public function grouping()
    {
        $movies = collect([
            ['name' => 'Back To the Future', 'genre' => 'scifi', 'rating' => 8],
            ['name' => 'The Matrix',  'genre' => 'fantasy', 'rating' => 9],
            ['name' => 'The Croods',  'genre' => 'animation', 'rating' => 8],
            ['name' => 'Zootopia',  'genre' => 'animation', 'rating' => 4],
            ['name' => 'The Jungle Book',  'genre' => 'fantasy', 'rating' => 5],
        ]);

        $genre = $movies->groupBy('genre');
        /*
        [
             "scifi" => [
               ["name" => "Back To the Future", "genre" => "scifi", "rating" => 8,],
             ],
             "fantasy" => [
               ["name" => "The Matrix", "genre" => "fantasy", "rating" => 9,],
               ["name" => "The Jungle Book", "genre" => "fantasy", "rating" => 5, ],
             ],
             "animation" => [
               ["name" => "The Croods", "genre" => "animation", "rating" => 8,],
               ["name" => "Zootopia", "genre" => "animation", "rating" => 4, ],
             ],
        ]
        */

        $rating = $movies->groupBy(function ($movie, $key) {
            return $movie['rating'];
        });

        /*
        [
           8 => [
             ["name" => "Back To the Future", "genre" => "scifi", "rating" => 8,],
             ["name" => "The Croods", "genre" => "animation", "rating" => 8,],
           ],
           9 => [
             ["name" => "The Matrix", "genre" => "fantasy", "rating" => 9,],
           ],
           4 => [
             ["name" => "Zootopia","genre" => "animation", "rating" => 4,],
           ],
           5 => [
             ["name" => "The Jungle Book","genre" => "fantasy","rating" => 5,],
           ],
        ]
         */
    }
}
