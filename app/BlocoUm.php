<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;


class BlocoUm extends Model implements Transformable, Presentable
{
    use PresentableTrait;
    use TransformableTrait;

    protected $fillable = ['title', 'sub_title', 'alt', 'user_id'];

}
