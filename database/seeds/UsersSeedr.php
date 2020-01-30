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
        \App\User::create(['email' => 'agent1@gmail.com', 'name' => 'Name: Suman Shrestha', 'password' => 'password', 'role' => 'agent']);
        \App\User::create(['email' => 'agent2@gmail.com', 'name' => 'Name: Suman Shrestha', 'password' => 'password', 'role' => 'agent']);
        \App\User::create(['email' => 'agent3@gmail.com', 'name' => 'Name: Suman Shrestha', 'password' => 'password', 'role' => 'agent']);

    }
}
