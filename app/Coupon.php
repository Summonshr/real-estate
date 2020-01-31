<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $casts = ['count'=>'int'];

    public function isVoid()
    {
        return $this->count === 0;
    }
    public function setUsed()
    {
        $this->decrement('count');

        $this->save();
    }
}
