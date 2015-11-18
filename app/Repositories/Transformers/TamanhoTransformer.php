<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Tamanho;

/**
 * Class TamanhoTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class TamanhoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Tamanho entity
     * @param \Tamanho $model
     *
     * @return array
     */
    public function transform(Tamanho $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
//            'created_at' => (string) $model->created_at,
//            'updated_at' => (string) $model->updated_at
        ];
    }
}
