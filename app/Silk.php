<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Silk extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name','description','medida','price_un_com','price_un_sem'];

    public function camisetas()
    {
        return $this->belongsToMany(Camisetas::class);
    }
}
