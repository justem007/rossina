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

}
