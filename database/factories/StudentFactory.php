<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Student::class, function (Faker $faker) {

    $rand = rand(1,2);
       return [
           'firstname' => $rand == 1 ? $faker->firstNameMale :$faker->firstNameFemale,
           'lastname' => $faker->lastName,
           'gender' =>  $rand == 1 ? "M" : "F",
           'birthdate'=>$faker->dateTimeBetween('-40 years', '-18 years'),
           'group_number' => str_random(5),
           'location' =>  $rand == 1 ?  "local" : "foreign",
           'rates'=>rand(0,200),

       ];

});
