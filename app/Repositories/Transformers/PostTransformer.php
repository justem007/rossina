<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Post;

/**
 * Class PostTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class PostTransformer extends TransformerAbstract
{

    /**
     * Transform the \Post entity
     * @param \Post $model
     *
     * @return array
     */
    public function transform(Post $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
