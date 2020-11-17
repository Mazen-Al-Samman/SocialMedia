<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comments;
use Faker\Generator as Faker;

$factory->define(Comments::class, function (Faker $faker) {

    return [
        'comment' => $faker->sentence(10) ,
        'tweet_id' => 1,
        'user_id' => 1
    ];
});