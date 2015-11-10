<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoCamiseta;

/**
 * Class BlocoCamisetaTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoCamisetaTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoCamiseta entity
     * @param \BlocoCamiseta $model
     *
     * @return array
     */
    public function transform(BlocoCamiseta $model)
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
