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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ViewTags $request, Property $property)
    {
        return $property->tags;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTag $request, Property $property, Tag $tag)
    {
        $property->tags()->save(new Tag($request->only('key','value')));

        return response('',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FetchTag $request, Property $property, Tag $tag)
    {
        return $tag;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTag $request, Property $property, Tag $tag)
    {
        $tag->fill($request->only('value'))->save();

        return response('',202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteTag $request, Property $property, Tag $tag)
    {
        $tag->delete();

        return response('',202);
    }
}
