<?php

namespace Tests\Feature;

use App\Coupon;
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
        $this->login();
        $this->post('/change-password',['old_password'=>'password', 'new_password'=>'passwords','new_password_confirmation'=>'passwords'])->assertStatus(202);
        $this->post('/change-password',['old_password'=>'password', 'new_password'=>'passwords','new_password_confirmation'=>'passwords'])->assertStatus(403);
    }

    public function testBalanceCanBeRecharged(){

        factory(Coupon::class, 3)->create();

        $this->login();

        $response = $this->post('/recharge',['code'=>'ABCXYZ'])->assertStatus(404);

        $coupon = Coupon::first();

        $balance = auth()->user()->balance;

        $this->post('/recharge',['code'=>$coupon->code])->assertStatus(202);

        $this->assertTrue(auth()->user()->balance * 1 == $balance + $coupon->amount);

        $this->addProperty()
        ->addProperty()
        ->addProperty()
        ->addProperty()
        ->addProperty()
        ->addProperty()
        ->addProperty()
        ->addProperty(403);

        $this->post('/recharge',['code'=>'RANDOM'])->assertStatus(404);
    }
}
