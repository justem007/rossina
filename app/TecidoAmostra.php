<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TecidoAmostra extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'description', 'medidas', 'price'];

    public function tecidos()
    {
        return $this->belongsToMany(Tecido::class);
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
