<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ComicsTableSeeder::class);
        $this->call(ComicsUserCollectionTableSeeder::class);
        $this->call(ComicUserWishlistTableSeeder::class);
    }
}
