<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Properties extends Component
{
    use WithPagination;

    public $order = 'asc';

    public $sortBy = 'created_at';

    public $perPage = 5;

    public function sortWith($by){
        $this->sortBy = $by;
        if($this->order === 'asc') {
            $this->order = 'desc';
        } else {
            $this->order = 'asc';
        }
    }

    public function render()
    {
        $properties = auth()->user()->properties()->orderBy($this->sortBy, $this->order)->paginate($this->perPage);

        return view('livewire.properties',['properties'=>$properties]);
    }
}
