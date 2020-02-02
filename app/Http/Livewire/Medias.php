<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\MediaLibrary\Models\Media;

class Medias extends Component
{
    public $add = false;

    public $property = false;

    public $property_id;

    public function open(){
        $this->add = true;
    }

    public function mount(){

       $this->property = request('property');

    }

    public function render()
    {
        $this->property = \App\Property::find($this->property->id);

        return view('livewire.medias');
    }

    public function deleteMedia($mediaId)
    {
        Media::find($mediaId)->delete();
    }

    public function setFeatured($mediaId)
    {
        Media::setNewOrder($this->property->getMedia('images')->sortBy('order_column')->except($mediaId)->pluck('id')->prepend($mediaId)->toArray());
    }
}