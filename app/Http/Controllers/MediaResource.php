<?php

namespace App\Http\Controllers;

use App\Http\Requests\Media\CreateMedia;
use App\Property;
use Illuminate\Http\Request;

class MediaResource extends Controller
{

    public function store(CreateMedia $request, Property $property)
    {
        $property->addMedia($request->file('file'))->toMediaCollection('images');

        return response('', 201);
    }

}
