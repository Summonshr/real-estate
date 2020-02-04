<?php
namespace App\Traits;

use App\Meta;

trait HasMeta
{
    public function fromMeta($key)
    {
        return optional($this->meta->where('key', $key)->first())->value;
    }

    public function meta($key = null)
    {
        if($key){
            return $this->meta()->where('key',$key)->first();
        }

        return $this->morphMany(Meta::class, 'metable');
    }

    public function updateMeta($values)
    {
        $metas = $this->meta;

        collect($values)->filter()->each(function ($value, $key) use ($metas) {
            $meta = $metas->where('key', $key)->first();

            if ($meta) {
                $meta->value = $value;
                $meta->save();
                return;
            }

            $meta = new Meta();
            $meta->forceFill(compact(['key', 'value']));
            $this->meta()->save($meta);
        });
    }
}