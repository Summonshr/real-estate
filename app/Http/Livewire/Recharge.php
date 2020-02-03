<?php

namespace App\Http\Livewire;

use App\Coupon;
use Livewire\Component;

class Recharge extends Component
{
    public $code = '';

    public $message = '';

    public $error = '';

    public function updated(){
        $this->error = '';
        $this->message = '';

        if($coupons = Coupon::where('code',$this->code)->first()){
            $this->message = 'Recharge worth Rs. '. $coupons->amount . ' will be applied to your account';
            if($coupons->count === 0) {
                $this->error = 'Coupon cannot be used anymore.';
                $this->message = '';
            }
            return ;
        }

        $this->error = 'Invalid Coupon';
    }

    public function render()
    {
        return view('livewire.recharge');
    }
}
