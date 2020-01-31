<?php

use Illuminate\Database\Seeder;

class UsersSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(['email' => 'admin@gmail.com', 'name' => 'Admin: Suman Shrestha', 'password' => 'password', 'role' => 'admin']);
        \App\User::create(['phone'=>'9841145614','email' => 'agent1@gmail.com', 'name' => 'Name: Suman Shrestha 1', 'password' => 'password', 'role' => 'agent']);
        \App\User::create(['phone'=>'9841145614','email' => 'agent2@gmail.com', 'name' => 'Name: Suman Shrestha 2', 'password' => 'password', 'role' => 'agent']);
        \App\User::create(['phone'=>'9841145614','email' => 'agent3@gmail.com', 'name' => 'Name: Suman Shrestha 3', 'password' => 'password', 'role' => 'agent']);

    }
}
