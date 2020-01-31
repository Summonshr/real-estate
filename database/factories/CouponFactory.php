<?php

use App\Coupon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'code' => $faker->postcode,
        'count' => 2,
        'amount' => 500
    ];
});
