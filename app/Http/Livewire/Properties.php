<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Properties extends Component
{
    use WithPagination;

    public $search = '';

    public $display = 'all';

    public $order = 'desc';

    public $sortBy = 'updated_at';

    public $perPage = 5;

    public function sortWith($by){
        $this->sortBy = $by;
        if($this->order === 'asc') {
            $this->order = 'desc';
        } else {
            $this->order = 'asc';
        }
    }

    public function destroy($propertyId) {
        auth()->user()->properties()->findOrFail($propertyId)->delete();
    }

    public function render()
    {
        $display = $this->display;

        $properties = auth()->user()->properties()->when($this->display !== 'all', function($query) use ($display) {
            if($this->display === 'with-trashed') {
                $query = $query->withTrashed();
            }
            if($this->display === 'only-trashed') {
                $query = $query->onlyTrashed();
            }
            return $query;
        })->when($this->search !== '', function($query){
            $query->where('name','like','%'.$this->search.'%');
        })->orderBy($this->sortBy, $this->order)->paginate($this->perPage);

        return view('livewire.properties',['properties'=>$properties]);
    }
}
