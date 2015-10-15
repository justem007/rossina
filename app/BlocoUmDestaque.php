<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BlocoUmDestaque extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title', 'sub_title', 'alt', 'image_id', 'user_id'];

}
