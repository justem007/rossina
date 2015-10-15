<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'text',
        'email',
        'post_id'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
