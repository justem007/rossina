<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

class Post extends Model implements Presentable
{
    use PresentableTrait;

    protected $fillable = ['title','text', 'active', 'user_id'];

    protected $hidden = ['tags', 'comments'];

    protected $appends = ['tag', 'comment'];

    public  function getTagAttribute()
    {
        return $this->tags->modelKeys();
    }

    public  function getCommentAttribute()
    {
        return $this->comments->modelKeys();
    }

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
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function categoriaBlogs()
    {
        return $this->belongsToMany(CategoriaBlog::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
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
