<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CategoriaTecido extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title', 'description'];

    public function tecidos()
    {
        return $this->belongsToMany(Tecido::class);
    }

}
