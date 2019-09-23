<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\models\ProductCategory::class, function (Faker $faker) {
    return [
        'title' => 'Категория '.$faker->sentence(1),
        'description' => $faker->text(50),
    ];
});
