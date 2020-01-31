<?php

namespace Tests\Feature;

use App\Property;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    /**
     * Test If property gets inserted.
     *
     * @return void
     */
    public function testPropertyGetsInserted()
    {
        $this->login();

        $this->addProperty();

        $this->assertDatabaseHas('properties', ['name' => 'New Property']);

        $this->addProperty();

        $this->assertCount(2, \App\Property::all());

    }

    /**
     * Assert Test is returning the required data
     */
    public function testReturnData()
    {
        $this->login();

        $this->addProperty();

        $response = $this->get('/properties')->assertStatus(200);

        $response->assertJson([['name'=>'New Property']]);

        $response->assertJson([['user_id'=>2]]);

        $response->assertJsonMissing([['user_id'=>3]]);


        $this->get('/properties/1')->assertStatus(200);

        $this->loginSecondUser();

        $this->addProperty();

        $this->get('/properties/1')->assertStatus(403);

        $this->get('/properties/4')->assertStatus(404);

        $response = $this->get('/properties')->assertStatus(200);

        $response->assertJson([['name'=>'New Property']]);

        $response->assertJson([['user_id'=>3]]);

        $response->assertJsonMissing([['user_id'=>2]]);

    }
    /**
     * Test If property gets inserted.
     *
     * @return void
     */
    public function testEditable()
    {
        $this->login();
        $this->addProperty();
        $this->put('properties/4',['name'=>'Property that does not exists'])->assertStatus(404);

        $this->loginSecondUser();

        $this->addProperty();

        $this->login();

        $this->put('properties/2',['name'=>'Property that this user does nto have access to'])->assertStatus(403);

        $this->put('properties/1',['name'=>'New Property Edited'])->assertStatus(202);

        $this->assertDatabaseHas('properties', ['name' => 'New Property Edited','type'=>'land']);

        $this->put('properties/1',['name'=>'New Property Edited Again', 'type'=>'house'])->assertStatus(202);

        $this->assertDatabaseHas('properties', ['name' => 'New Property Edited Again','type'=>'house']);

        $this->put('properties/2',['name'=>'New Vertical Algined Properties','type'=>'land'])->assertStatus(403);

        $this->loginSecondUser();

        $this->put('properties/2',['name'=>'New Vertical Algined Properties','type'=>'house'])->assertStatus(202);

        $this->assertDatabaseHas('properties', ['id'=>'2', 'name' => 'New Vertical Algined Properties','type'=>'house']);

    }

    /**
     * Test if property gets deleted
     */
    public function testPropertyGetsDeleted(){
        $this->login()->addProperty()->addTags(1);

        $this->loginSecondUser();

        $this->delete('properties/1')->assertStatus(403);

        $this->login();

        $this->delete('properties/1')->assertStatus(202);

        $this->assertSoftDeleted('properties',['id'=>"1"]);

        $this->assertSoftDeleted('tags',['property_id'=>"1"]);

    }

}
