<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title', 'description', 'user_id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
