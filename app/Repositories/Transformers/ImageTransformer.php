<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Image;

/**
 * Class ImageTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class ImageTransformer extends TransformerAbstract
{

    /**
     * Transform the \Image entity
     * @param \Image $model
     *
     * @return array
     */
    public function transform(Image $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
