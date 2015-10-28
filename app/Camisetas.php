<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Camisetas extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'description', 'price', 'quantidade', 'info', 'active'];

    public function generos()
    {
        return $this->belongsToMany('Rossina\Genero');
    }

    public function cors()
    {
        return $this->belongsToMany('Rossina\Cor');
    }

    public function tamanhos()
    {
        return $this->belongsToMany('Rossina\Tamanho');
    }

    public function silks(){
        return $this->belongsToMany('Rossina\Silk');
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    public function tags()
    {
        return $this->belongsToMany('Rossina\Tag');
    }
}
