<?php
/**
 * Created by PhpStorm.
 * User: Rashmi Gamage
**/

$factory->define(App\Description::class, function (Faker\Generator $faker) {
return [
'imsge_id' => $faker->numberBetween(1,5),
'description' => $faker->text,
];
});