<?php

namespace Tests\Feature;

use App\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class MediaTest extends TestCase
{
    public function testPropertyCanHaveManyMedias()
    {
        $this->login();

        $this->addProperty();

        copy(public_path('test.jpg'), storage_path('test.jpg'));

        $random = \Str::random(8);

        $filename = 'test-'.$random.'.jpg';

        $thumb = 'test-'.$random.'-thumb.jpg';

        $this->post('/properties/1/media',['file'=>new UploadedFile(storage_path('test.jpg'),$filename)])->assertStatus(302);

        $this->assertFileExists(storage_path('app/public/1/'.$filename));

        $this->assertFileExists(storage_path('app/public/1/conversions/'.$thumb));

        $this->assertCount(1, Property::first()->getMedia('images'));

        copy(public_path('test.jpg'), storage_path('test.jpg'));

        $this->post('/properties/3/media',['file'=>new UploadedFile(storage_path('test.jpg'),$filename)])->assertStatus(404);

    }
}
