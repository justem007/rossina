<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['text', 'email', 'post_id'];

    public function posts(){

        return $this->belongsTo('Rossina\Post');
    }
}
