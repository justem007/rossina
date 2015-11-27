<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Ferramenta extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title', 'description', 'alt', 'image_id', 'user_id'];

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }
    public function getUpdatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }

}
