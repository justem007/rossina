<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Genero extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'description'];

    public function camisetas()
    {
        return $this->belongsToMany('Rossina\Camisetas');
    }

}
