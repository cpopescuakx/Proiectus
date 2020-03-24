<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Aquest seeder s'utilitza per a importar dades massives a la taula Blogs.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => Str::random(20),
        ]);
    }
}
