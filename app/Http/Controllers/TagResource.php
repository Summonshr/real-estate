<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\CreateTag;
use App\Http\Requests\Tag\DeleteTag;
use App\Http\Requests\Tag\FetchTag;
use App\Http\Requests\Tag\UpdateTag;
use App\Http\Requests\Tag\ViewTags;
use App\Property;
use App\Tag;

class TagResource extends Controller
{

    public function index(ViewTags $request, Property $property)
    {
        return $property->tags;
    }

    public function store(CreateTag $request, Property $property, Tag $tag)
    {
        $property->tags()->save(new Tag($request->only('key','value')));

        return response('',201);
    }

    public function show(FetchTag $request, Property $property, Tag $tag)
    {
        return $tag;
    }

    public function update(UpdateTag $request, Property $property, Tag $tag)
    {
        $tag->fill($request->only('value'))->save();

        return response('',202);
    }

    public function destroy(DeleteTag $request, Property $property, Tag $tag)
    {
        $tag->delete();

        return response('',202);
    }
}
