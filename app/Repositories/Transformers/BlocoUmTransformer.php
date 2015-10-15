<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoUm;

/**
 * Class BlocoUmTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoUmTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoUm entity
     * @param \BlocoUm $model
     *
     * @return array
     */
    public function transform(BlocoUm $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
