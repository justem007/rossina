<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tag extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title'];

    public function presenter()
    {
        return "Prettus\\Repository\\Presenter\\ModelFractalPresenter";
    }

    public function posts()
    {
        return $this->belongsToMany('Rossina\Post');
    }

    public function tecidos()
    {
        return $this->belongsToMany('Rossina\Tecido');
    }

    public function camisetas()
    {
        return $this->belongsToMany('Rossina\Camisetas');
    }

}
