<?php

namespace Rossina;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

class Post extends Model implements Presentable
{
    use PresentableTrait;

    protected $fillable = ['title','text', 'active', 'user_id'];

    public function images()
    {
        return $this->belongsToMany('Rossina\Image');
    }

    public function comments()
    {
        return $this->hasMany('Rossina\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('Rossina\Tag');
    }

    public function users()
    {
        return $this->belongsTo('Rossina\User');
    }

}
