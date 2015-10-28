<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tamanho extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name'];


    public function camisetas()
    {
        return $this->belongsToMany('Rossina\Camisetas');
    }

}
