<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProperty;
use App\Http\Requests\Property\CreateProperty;
use App\Http\Requests\Property\DeleteProperty;
use App\Http\Requests\Property\FetchProperty;
use App\Http\Requests\Property\UpdateProperty;
use App\Http\Requests\Property\ViewProperties;
use App\Property;

class PropertyResource extends Controller
{

    public function create(CreateProperty $request, Property $property)
    {
        return view('app.properties.new',['property'=>$property]);
    }

    public function edit(EditProperty $request, Property $property)
    {
        return view('app.properties.new',['property'=>$property]);
    }

    public function index(ViewProperties $request)
    {
        return view('app.properties.list');
    }

    public function store(CreateProperty $request)
    {
        $property = new \App\Property();

        $property->fill($request->only(['name','type','purpose','unit','price']));

        $request->user()->properties()->save($property);

        $request->user()->deduct(config('settings.price_per_property'));

        return redirect(route("properties.index"))->with('alert','success:Property has been added.');
    }

    public function show(FetchProperty $request, Property $property)
    {
        $property->load('tags');

        return $property;
    }


    public function update(UpdateProperty $request, Property $property)
    {
        $property->fill($request->only(['name','type','unit','price','purpose']))->save();

        return redirect(route('properties.index'))->with('alert','success: Action Successful');
    }


    public function destroy(DeleteProperty $request, Property $property)
    {
        $property->delete();

        return redirect(route('properties.index'))->with('alert','success: Action Successful');
    }
}
