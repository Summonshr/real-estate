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

    public function index(ViewProperties $request)
    {
        return $request->user()->properties()->with('tags')->get();
    }

    public function store(CreateProperty $request)
    {
        $property = new \App\Property();

        $property->fill($request->only(['name','type']));

        $request->user()->properties()->save($property);

        $request->user()->deduct(config('settings.price_per_property'));

        return response('',201);
    }

    public function show(FetchProperty $request, Property $property)
    {
        $property->load('tags');

        return $property;
    }


    public function update(UpdateProperty $request, Property $property)
    {
        $property->fill($request->only(['name','type']))->save();

        return response('',202);
    }


    public function destroy(DeleteProperty $request, Property $property)
    {
        $property->delete();

        return response('',202);
    }
}
