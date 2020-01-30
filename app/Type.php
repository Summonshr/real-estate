<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Type extends Model
{
    use Sushi;

    public $rows = [
        [
            'key' => 'land'
        ],
        [
            'key' => 'house'
        ]
    ];

    public function properties()
    {
        return $this->hasMany(Property::class,'type','key');
    }
}
