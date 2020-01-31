<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeaturedTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPropertiesCanBeFeatured()
    {
        $this->login();

        $this->addProperty();

        $this->assertDatabaseMissing('featureds',['property_id'=>1]);

        $this->post('/properties/1/featured')->assertStatus(201);

        $this->assertDatabaseHas('properties',['id'=>1, 'is_featured'=>true]);

        $this->assertDatabaseHas('featureds',['property_id'=>1]);

    }

    public function testAnotherUsersPropertyCannotBeTouched()
    {
        $this->login();

        $this->addProperty();

        $this->loginSecondUser();

        $this->post('/properties/1/featured')->assertStatus(403);

    }

    public function testPropertyCanBeDeleted()
    {
        $this->login();

        $this->addProperty();

        $this->post('/properties/1/featured')->assertStatus(201);

        $this->loginSecondUser();

        $this->delete('/properties/1/featured')->assertStatus(403);

        $this->login();

        $this->delete('/properties/1/featured')->assertStatus(202);

        $this->assertSoftDeleted('featureds',['property_id'=>'1']);

        $this->assertDatabaseHas('properties',['id'=>1, 'is_featured'=>false]);

    }
}
