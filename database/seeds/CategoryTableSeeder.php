<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title'=>'Business'],
            ['title'=>'Tech'],
            ['title'=>'Health'],
            ['title'=>'Science'],
        ]);
    }
}
