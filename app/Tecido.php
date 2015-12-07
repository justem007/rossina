<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tecido extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'description', 'info', 'price_com', 'price_sem', 'user_id'];

    public function tecimages()
    {
        return $this->belongsToMany(Tecimage::class);
    }

    public function tecidoamostras()
    {
        return $this->belongsToMany(TecidoAmostra::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categoriaTecidos()
    {
        return $this->belongsToMany(CategoriaTecido::class);
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
