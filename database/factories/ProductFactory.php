<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\models\Product::class, function (Faker $faker) {
    return [
        'title' => 'Продукт '.$faker->sentence(1),
        'description' => $faker->text(50),
    ];
});
