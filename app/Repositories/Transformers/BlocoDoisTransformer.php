<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoDois;

/**
 * Class BlocoDoisTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoDoisTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoDois entity
     * @param \BlocoDois $model
     *
     * @return array
     */
    public function transform(BlocoDois $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
