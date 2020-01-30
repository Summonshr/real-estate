<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeature;
use App\Http\Requests\DeleteFeature;
use App\Property;
use Illuminate\Http\Request;

class FeatureResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(CreateFeature $feature, Property $property)
    {
        $property->markAsFeatured();
        return response('',201);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeatureResource  $featureResource
     * @return \Illuminate\Http\Response
     */
    public function edit(FeatureResource $featureResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeatureResource  $featureResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeatureResource $featureResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FeatureResource  $featureResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteFeature $request, Property $property)
    {
        $property->removeAsFeatured();

        return response('', 202);
    }
}
