<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    public $fillable = ['name','type'];

    public function tags(){
        return $this->hasMany(\App\Tag::class);
    }

    public function setTypeAttribute($type){
        $this->attributes['type'] = strtolower($type);
    }
}
