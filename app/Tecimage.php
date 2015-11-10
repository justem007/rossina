<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tecimage extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}