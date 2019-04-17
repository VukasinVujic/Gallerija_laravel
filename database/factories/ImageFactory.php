<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl($width = 640, $height = 400),
        'order' => $order++,
        'gallery_id' => function(){
            return App\Gallery::all()->random()->id;
        }
    ];
});
