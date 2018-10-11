<?php
$faker = Faker\Factory::create();
return [
    [
        'id' => 1,
        'name' => $faker->name,
        'description' => $faker->address,
        'deleted' => 0,
        'updated_at' => $faker->date().' '.$faker->time(),
        'arrived' => 1,
        'loadingDate' => $faker->date().' '.$faker->time(),
        'role_id' => 10
    ],
    [
        'id' => 2,
        'name' => $faker->name,
        'description' => $faker->address,
        'deleted' => 0,
        'updated_at' => $faker->date().' '.$faker->time(),
        'arrived' => 0,
        'loadingDate' => $faker->date().' '.$faker->time(),
        'role_id' => 11
    ]
];