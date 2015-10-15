<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoUmDestaque;

/**
 * Class BlocoUmDestaqueTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoUmDestaqueTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoUmDestaque entity
     * @param \BlocoUmDestaque $model
     *
     * @return array
     */
    public function transform(BlocoUmDestaque $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
