<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl($width = 640, $height = 400),
        'gallery_id' => function(){
            return App\Gallery::all()->random()->id;
        }
    ];
});
