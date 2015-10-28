<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Etiqueta extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'description', 'active', 'url_pdf', 'user_id'];

    public function camisetas()
    {
        return $this->belongsToMany(Camisetas::class);
    }
}
