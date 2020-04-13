<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        'user_id'=> random_int(1,10),
        'title'=>$faker->word,
        'content'=>$faker->paragraph
    ];
});
