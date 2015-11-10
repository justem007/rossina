<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoDoisDestaqueUm;

/**
 * Class BlocoDoisDestaqueUmTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoDoisDestaqueUmTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoDoisDestaqueUm entity
     * @param \BlocoDoisDestaqueUm $model
     *
     * @return array
     */
    public function transform(BlocoDoisDestaqueUm $model)
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
