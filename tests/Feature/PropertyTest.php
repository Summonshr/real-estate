<?php

namespace Tests\Feature;

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

        $balance = auth()->user()->balance;

        $this->addProperty();

        $this->assertTrue($balance - 100 === auth()->user()->balance * 1);

        $this->assertCount(1, \App\Property::all());

        $this->addProperty();

        $this->assertCount(2, \App\Property::all());

        $this->assertTrue($balance - 200 === auth()->user()->balance * 1);

        $this->addProperty(403);

    }




    /**
     * Test if property gets deleted
     */
    public function testPropertyGetsDeleted(){
        $this->login()->addProperty()->addTags(1);

        $this->loginSecondUser();

        $this->delete('properties/1')->assertStatus(403);

        $this->login();

        $this->delete('properties/1')->assertStatus(302);

        $this->assertSoftDeleted('properties',['id'=>"1"]);

        $this->assertSoftDeleted('tags',['property_id'=>"1"]);

    }

}
