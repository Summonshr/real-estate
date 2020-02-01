<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Properties extends Component
{
    public function render()
    {
        $properties = auth()->user()->properties()->get();
        return view('livewire.properties',['properties'=>$properties]);
    }
}
