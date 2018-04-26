<?php
/**
 * Created by PhpStorm.
 * User: Rashmi Gamage

 */

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
        'image_url' => $faker->url,
    ];
});