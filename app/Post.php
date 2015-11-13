<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

class Post extends Model implements Presentable
{
    use PresentableTrait;

    protected $fillable = ['title','text', 'active', 'user_id'];

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function categoriaBlogs()
    {
        return $this->belongsToMany(CategoriaBlog::class);
    }

}
