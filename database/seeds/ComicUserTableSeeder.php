<?php

use Illuminate\Database\Seeder;

class ComicUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the users we want to associate comics with
        # The *key* will be the user name, and the *value* will be an array of comic_ids.
        $users =[
           'Admin' => [41530, 58530, 56205],
           'Jill' => [41530, 58530, 56205],
           'Jamal' => [41530, 58530, 56205]
        ];
        # Now loop through the above array, creating a new pivot for each user to comic
        foreach($users as $name => $comic_ids) {
           # First get the user
           $user = \Project4\User::where('name','like',$name)->first();
           # Now loop through each comic for this user, adding the pivot
           foreach($comic_ids as $comic_id) {
               $comic = \Project4\Comic::where('comic_id','LIKE',$comic_id)->first();
               # Connect this comic to this user
               # (create a many to many entry)
               $user->comics()->save($comic,array('collection' => true, 'wishlist' => true));
           }
        }
    }
}
