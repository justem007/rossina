<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Image extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'description', 'alt', 'title', 'extension', 'user_id'];

    public function posts()
    {
        return $this->belongsToMany('Rossina\Post');
    }

    public function ferramentas()
    {
        return $this->belongsToMany('Rossina\Ferramenta');
    }
}
