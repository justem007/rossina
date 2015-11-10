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
        return $this->belongsToMany(Genero::class);
    }

    public function cors()
    {
        return $this->belongsToMany(Cor::class);
    }

    public function tamanhos()
    {
        return $this->belongsToMany(Tamanho::class);
    }

    public function silks(){
        return $this->belongsToMany(Silk::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
