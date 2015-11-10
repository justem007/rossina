<?php

namespace Rossina;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Horario extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['atendimento', 'telefone', 'entrega'];

}
