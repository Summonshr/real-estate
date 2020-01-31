<?php

namespace Tests;

use App\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseMigrations as TestingDatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase as TestingRefreshDatabase;
trait CreatesApplication
{
    use TestingRefreshDatabase, TestingDatabaseMigrations;
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function setUp(): void{
        parent::setUp();

        $user = factory(User::class, 3)->create();

    }

    public function addProperty($status = 201){

        $this->post('/properties', ['name' => 'New Property', 'type' => 'land'])->assertStatus($status);

        return $this;

    }

    public function addTags($id){
        $this->post('/properties/'.$id.'/tags', ['key' => 'location', 'value' => 'South West England'])->assertStatus(201);

        return $this;
    }

    public function login(){
        auth()->login(\App\User::where('role', 'agent')->first());

        return $this;
    }

    public function loginSecondUser(){
        auth()->login(\App\User::where('role', 'agent')->skip(1)->first());

        return $this;
    }
}
