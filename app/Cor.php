<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cor extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'rgb'];

    public function camisetas()
    {
        return $this->belongsToMany(Camisetas::class);
    }
}
