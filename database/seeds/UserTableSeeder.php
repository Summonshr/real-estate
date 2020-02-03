<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 2)->create()->each(function($user){
            $user->properties()->saveMany(factory(\App\Property::class, 20)->make());
        });
    }
}
