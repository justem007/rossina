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
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'image_id'   => (int) $model->image_id,
            'user_id'    => (int) $model->user_id,
            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at,
        ];
    }
}
