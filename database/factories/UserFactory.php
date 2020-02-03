<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone'=> $faker->phoneNumber,
        'balance'=>200,
        'role'=>'agent',
        'address'=>$faker->address,
        'email_verified_at' => now(),
        'password' => 'password', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(\App\Property::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type'=> collect(['house','land','apartment','bunglow','room'])->shuffle()->first(),
        'unit'=>collect(['year','month','aana','day','week','ropani'])->shuffle()->first(),
        'purpose'=>collect(['rent','sale'])->shuffle()->first(),
        'price'=>$faker->randomDigit*1000
    ];
});

$factory->define(\App\Theme::class, function($faker){
    return [
        'name'=>$faker->company,
        'description'=>$faker->realText,
        'image_url'=>'https://placekitten.com/'. collect([360,361,362,363,364,365,366,359,358,357,356,355])->shuffle()->take(2)->join('/')
    ];
});