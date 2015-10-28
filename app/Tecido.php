<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tecido extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'descriprion', 'info', 'price_com', 'price_sem', 'user_id'];

    public function tecimages()
    {
        return $this->belongsToMany('Rossina\Tecimage');
    }

    public function tecidoAmostras()
    {
        return $this->belongsToMany('Rossina\TecidoAmostra');
    }

    public function tags()
    {
        return $this->belongsToMany('Rossina\Tag');
    }
}
