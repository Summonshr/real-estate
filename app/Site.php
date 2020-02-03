<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public $fillable = ['name','url'];

    public function getDummyImageAttribute(){
        return 'https://placekitten.com/'. collect([360,361,362,363,364,365,366,359,358,357,356,355])->shuffle()->take(2)->join('/');
    }
}
