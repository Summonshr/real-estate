<?php

namespace App\Http\Controllers;

use App\Http\Requests\Media\CreateMedia;
use App\Property;

class MediaResource extends Controller
{

    public function store(CreateMedia $request, Property $property, $type = 'images')
    {
        $property->addMedia($request->file('file'))->toMediaCollection(\Str::plural(explode('/',$request->file('file')->getMimeType())[0]));

        return back()->with('alert','success: Media Uploaded successfully.');
    }

}
