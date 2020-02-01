<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Photos extends Component
{
    public $add = false;

    public function open(){
        $this->add = true;
    }

    public function render()
    {
        return view('livewire.photos');
    }
}
