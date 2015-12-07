<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Horario;

/**
 * Class HorarioTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class HorarioTransformer extends TransformerAbstract
{

    /**
     * Transform the \Horario entity
     * @param \Horario $model
     *
     * @return array
     */
    public function transform(Horario $model)
    {
        return [
            'id'            => (int) $model->id,
            'atendimento'   => $model->atendimento,
            'telefone'      => $model->telefone,
            'entrega'       => $model->entrega,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
