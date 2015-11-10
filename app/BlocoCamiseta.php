<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BlocoCamiseta extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title', 'sub_title', 'alt'];

}
