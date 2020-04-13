<?php

use Illuminate\Database\Seeder;

class ArticalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Article::class,10)->create();
    }
}
