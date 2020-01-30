<?php

namespace Tests;

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

        $this->artisan('db:seed');

        $this->loginFirstUser();

        $this->post('/properties', ['name' => 'New Property', 'type' => 'land']);

        $this->post('/properties/1/tags', ['key' => 'location', 'value' => 'South West England']);

        $this->loginSecondUser();

        $this->post('/properties', ['name' => 'Next Property', 'type' => 'house']);

    }

    public function loginFirstUser(){
        auth()->login(\App\User::where('role', 'agent')->first());
    }

    public function loginSecondUser(){
        auth()->login(\App\User::where('role', 'agent')->skip(1)->first());
    }
}
