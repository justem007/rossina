<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoDoisDestaqueDois;

/**
 * Class BlocoDoisDestaqueDoisTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoDoisDestaqueDoisTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoDoisDestaqueDois entity
     * @param \BlocoDoisDestaqueDois $model
     *
     * @return array
     */
    public function transform(BlocoDoisDestaqueDois $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
