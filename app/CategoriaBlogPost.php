<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CategoriaBlogPost extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
