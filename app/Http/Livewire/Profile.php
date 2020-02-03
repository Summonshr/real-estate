<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public $user;

    public $image;

    public $name;

    public $address;

    public $email;

    public $phone;

    public $justUpdated = false;

    public function mount()
    {
        $this->user = auth()->user();

        $this->name = $this->user->name;

        $this->address = $this->user->address;

        $this->email = $this->user->email;

        $this->phone = $this->user->phone;

        $this->image = auth()->user()->getMedia('profile')->last();
    }

    public function updated(){

        $this->justUpdated = false;
    }

    public function update()
    {
        $user = auth()->user();

        $user->fill(['name'=>$this->name,'address'=>$this->address,'phone'=>$this->phone]);

        $user->save();

        $this->justUpdated = true;

    }

    public function render()
    {
        return view('livewire.profile');
    }
}
