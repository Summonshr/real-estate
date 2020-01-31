<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Property extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $fillable = ['name','type'];


    public static function boot()
    {
        parent::boot();

        static::deleted(function ($property) {
            $property->tags()->delete();
        });
    }

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

    public function isAccessible()
    {
        return $this->user_id = auth()->id();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
    }
}
