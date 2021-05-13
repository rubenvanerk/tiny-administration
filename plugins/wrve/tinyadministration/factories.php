<?php

use Winter\User\Models\User;
use WRvE\TinyAdministration\Models\Location;
use WRvE\TinyAdministration\Models\Person;

/** @var $factory Illuminate\Database\Eloquent\Factory */
$factory->define(Person::class, function (\OFFLINE\Seeder\Classes\Generator $faker) {
    return [
        'donor_since' => $faker->boolean(33) ? $faker->dateTimeThisDecade : null,
        'location_id' => Location::doesntHave('children')->inRandomOrder()->first()->id,
        'user_id' => function () {
            return factory(User::class);
        }
    ];
});
