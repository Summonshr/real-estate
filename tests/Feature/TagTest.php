<?php

namespace Tests\Feature;

use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * Test if tags gets created
     *
     * @return void
     */
    public function testTagGetsCreated()
    {
        $this->login();

        $this->addProperty()->addTags(1);

        $this->assertDatabaseHas('tags', ['property_id' => "1", 'key' => 'location', 'value' => 'South West England']);

        $this->post('properties/1/tags',['key'=>'location','value'=>'New South Wales'])->assertStatus(201);

        $this->loginSecondUser();

        $this->addProperty()->addTags(2);

        $this->login();

        $this->post('properties/2/tags',['key'=>'location','value'=>'Not my property'])->assertStatus(403);

        $this->post('properties/3/tags',['key'=>'location','value'=>'This does not exists yet'])->assertStatus(404);
    }

    /**
     * Test if tags gets created
     *
     * @return void
     */
    public function testTagGetsUpdated(){

        $this->login()->addProperty()->addTags(1);

        $this->patch('properties/1/tags/1',['value'=>'North West England'])->assertStatus(202);

        $this->assertDatabaseHas('tags', ['property_id'=>"1", 'key'=>'location', 'value'=>'North West England']);

        $this->patch('properties/3/tags/1',['value'=>'North West England'])->assertStatus(404);

        $this->loginSecondUser()->addProperty()->addTags(2);

        $this->login();

        $this->patch('properties/2/tags/1',['value'=>'North West England'])->assertStatus(403);
    }

    /**
     * Test if tags gets deleted
     */
    public function testTagsGetsDeleted()
    {

        $this->login()->addProperty()->addTags(1);

        $this->delete('properties/1/tags/1')->assertStatus(202);

        $this->assertSoftDeleted('tags',['id'=> "1"]);
    }
}
