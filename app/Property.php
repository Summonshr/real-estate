<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Property extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $fillable = ['name','type'];

    public function tags(){
        return $this->hasMany(\App\Tag::class);
    }

    public function setTypeAttribute($type){
        $this->attributes['type'] = strtolower($type);
    }

    public function featured(){
        return $this->hasMany(Featured::class);
    }

    public function markAsFeatured(){
        $this->is_featured = true;

        $this->save();

        $this->featured()->save(new Featured(['from'=>now(),'to'=>now()]));
    }

    public function removeAsFeatured(){
        $this->is_featured = false;

        $this->save();

        $this->featured()->delete();

    }
}
