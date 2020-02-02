<?php

namespace App\Http\Controllers;

use App\Http\Requests\Media\CreateMedia;
use App\Property;

class MediaResource extends Controller
{

    public function store(CreateMedia $request, Property $property, $type = 'images')
    {
        $property->addMedia($request->file('file'))->toMediaCollection($request->file('file')->getMimeType());

        return back()->with('alert','success: Media Uploaded successfully.');
    }

}
