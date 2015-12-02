<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\CategoriaBlogPost;

/**
 * Class CategoriaBlogPostTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class CategoriaBlogPostTransformer extends TransformerAbstract
{

    /**
     * Transform the \CategoriaBlogPost entity
     * @param \CategoriaBlogPost $model
     *
     * @return array
     */
    public function transform(CategoriaBlogPost $model)
    {
        return [
            'id'                => (int) $model->id,
            'categoria_blog_id' => (int) $model->categoria_blog_id,
            'post_id'           => (int) $model->post_id,
//            'created_at'        => $model->created_at,
//            'updated_at'        => $model->updated_at
        ];
    }
}
