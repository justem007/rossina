<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoCamisetaDestaque;

/**
 * Class BlocoCamisetaDestaqueTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoCamisetaDestaqueTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoCamisetaDestaque entity
     * @param \BlocoCamisetaDestaque $model
     *
     * @return array
     */
    public function transform(BlocoCamisetaDestaque $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,

//            'created_at' => $model->created_at,
//            'updated_at' => $model->updated_at
        ];
    }
}
