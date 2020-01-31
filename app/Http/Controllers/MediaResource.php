<?php

namespace App\Http\Controllers;

use App\Http\Requests\Media\CreateMedia;
use App\Property;
use Illuminate\Http\Request;

class MediaResource extends Controller
{

    public function store(CreateMedia $request, Property $property, $type = 'images')
    {
        $property->addMedia($request->file('file'))->toMediaCollection($type);

        return response('', 201);
    }

}
