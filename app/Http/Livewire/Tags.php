<?php

namespace App\Http\Livewire;

use App\Property;
use App\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $property;

    public $tag;

    public $tag_options = [
        'option_1'=>'Option 1',
        'option_2'=>'Option 2',
        'option_3'=>'Option 3',
        'option_4'=>'Option 4',
        'option_5'=>'Option 5',
        'option_6'=>'Option 6',
    ];


    public $tags = [];

    public function mount(Property $property)
    {

        $this->property = $property;

        $this->tags = $this->property->tags;

    }

    public function getOptionsProperty()
    {
        return collect($this->tag_options)->keys()->reject(function($value, $key){
            return $this->property->tags->pluck('keys')->contains($key);
        });
    }

    public function add()
    {
        $this->property->tags()->save(new Tag(['key'=>$this->tag]));
    }

    public function render()
    {
        return view('livewire.tags');
    }
}
