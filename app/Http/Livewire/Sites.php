<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sites extends Component
{
    public $sites = [];

    public function mount()
    {
        $this->sites = auth()->user()->sites;
    }
    public function render()
    {
        return view('livewire.sites');
    }
}
