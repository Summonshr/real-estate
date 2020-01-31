<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeaturedTest extends TestCase
{
    /**
     * Test Properties can be featured.
     *
     * @return void
     */
    public function testPropertiesCanBeFeatured()
    {
        $this->loginFirstUser();

        $this->assertDatabaseMissing('featureds',['property_id'=>1]);

        $this->post('/properties/1/featured')->assertStatus(201);

        $this->assertDatabaseHas('properties',['id'=>1, 'is_featured'=>true]);

        $this->assertDatabaseHas('featureds',['property_id'=>1]);

        $this->assertDatabaseHas('featureds',['property_id'=>'1']);

        $this->post('/properties/2/featured')->assertStatus(403);

        $this->delete('/properties/1/featured')->assertStatus(202);

        $this->assertSoftDeleted('featureds',['property_id'=>'1']);

        $this->assertDatabaseHas('properties',['id'=>1, 'is_featured'=>false]);

        $this->loginSecondUser();

        $this->post('/properties/2/featured')->assertStatus(201);

    }
}
