<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Ferramenta;

/**
 * Class FerramentaTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class FerramentaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Ferramenta entity
     * @param \Ferramenta $model
     *
     * @return array
     */
    public function transform(Ferramenta $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
