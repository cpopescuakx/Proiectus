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
        DB::table('users')->insert([
            'username' =>Str::random(10),
            'firstname' =>Str::random(10),
            'email' =>Str::random(15),
            'password' => bcrypt('password')
        ]);
        $this->call(BlogsTableSeeder::class);
    }
}
