<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sites extends Component
{
    public $theme_id = '';

    public function render()
    {
        return view('livewire.sites');
    }
}
