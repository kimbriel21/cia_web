<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\Member::class, 20)->create();
        factory(\App\Ministry::class, 20)->create();
        factory(\App\Member_ministry::class, 30)->create();
    }
}
