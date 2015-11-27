<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Image extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'description', 'alt', 'title', 'extension', 'user_id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function ferramentas()
    {
        return $this->belongsToMany('Rossina\Ferramenta');
    }

    public function getCreatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }
    public function getUpdatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }
}
