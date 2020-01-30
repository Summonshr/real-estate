<?php

namespace App\Http\Controllers;

use App\Http\Requests\Property\CreateProperty;
use App\Http\Requests\Property\DeleteProperty;
use App\Http\Requests\Property\FetchProperty;
use App\Http\Requests\Property\UpdateProperty;
use App\Http\Requests\Property\ViewProperties;
use App\Property;

class PropertyResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ViewProperties $request)
    {
        return $request->user()->properties()->with('tags')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProperty $request)
    {
        $property = new \App\Property();

        $property->fill($request->only(['name','type']));

        $request->user()->properties()->save($property);

        return response('',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FetchProperty $request, Property $property)
    {
        $property->load('tags');

        return $property;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProperty $request, Property $property)
    {
        $property->fill($request->only(['name','type']))->save();

        return response('',202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteProperty $request, Property $property)
    {
        $property->delete();

        $property->tags()->delete();

        return response('',202);
    }
}
