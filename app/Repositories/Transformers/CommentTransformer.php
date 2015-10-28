<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Comment;

/**
 * Class CommentTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class CommentTransformer extends TransformerAbstract
{

    /**
     * Transform the \Comment entity
     * @param \Comment $model
     *
     * @return array
     */
    public function transform(Comment $model)
    {
        return [
            'id'         => (int) $model->id,
            'text'       => $model->text,
            'name'       => $model->name,
            'email'      => $model->email,
            'active'     => (boolean) $model->active,
            'post_id'    => (int) $model->post_id,
            'created_at' => (string) $model->created_at,
//            'updated_at' => (string) $model->updated_at,
        ];
    }
}
