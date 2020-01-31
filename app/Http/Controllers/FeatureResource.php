<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feature\CreateFeature;
use App\Http\Requests\Feature\DeleteFeature;
use App\Property;
use Illuminate\Http\Request;

class FeatureResource extends Controller
{
    public function store(CreateFeature $feature, Property $property)
    {
        $property->markAsFeatured();

        return response('',201);
    }

    public function destroy(DeleteFeature $request, Property $property)
    {
        $property->removeAsFeatured();

        return response('', 202);
    }
}
