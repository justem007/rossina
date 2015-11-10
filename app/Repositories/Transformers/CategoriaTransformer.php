<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Categoria;

/**
 * Class CategoriaTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class CategoriaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Categoria entity
     * @param \Categoria $model
     *
     * @return array
     */
    public function transform(Categoria $model)
    {
        return [
            'id'          => (int) $model->id,
            'title'       => $model->title,
            'description' => $model->description,
            'user_id'     => (int) $model->user_id,

//            'created_at' => $model->created_at,
//            'updated_at' => $model->updated_at
        ];
    }
}
