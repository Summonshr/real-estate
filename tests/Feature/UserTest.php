<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testUsersCanPerformSignInOperations()
    {
        auth()->logout();
        $this->post('/sign-up',['email'=>'summonshr@gmail.com','password'=>'password','name'=>'Suman Shrestha'])->assertStatus(201);
        $this->post('/sign-up',['email'=>'summonshr@gmail.com','password'=>'password','name'=>'Suman Shrestha'])->assertStatus(302);
        $this->post('/sign-in',['email'=>'summonshr@gmail.com','password'=>'password'])->assertStatus(202);
        $this->post('/sign-in',['email'=>'summonshr@gmail.com','password'=>'passwords'])->assertStatus(403);
        $this->post('/sign-in',['email'=>'none@gmail.com','password'=>'password'])->assertStatus(403);
    }

    public function testPasswordCanBeUpdated()
    {
        $this->loginFirstUser();

        $this->post('/change-password',['old_password'=>'password', 'new_password'=>'passwords','new_password_confirmation'=>'passwords'])->assertStatus(202);
        $this->post('/change-password',['old_password'=>'password', 'new_password'=>'passwords','new_password_confirmation'=>'passwords'])->assertStatus(403);

    }
}
