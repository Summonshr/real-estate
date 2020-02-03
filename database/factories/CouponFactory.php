<?php

use App\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'code' => 'OFF'.$faker->postcode,
        'count' => 2,
        'amount' => 500
    ];
});
