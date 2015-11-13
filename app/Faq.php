<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Faq extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['title', 'description'];

    public function categoriaFaqs()
    {
        return $this->belongsTo(CategoriaFaq::class);
    }
}
