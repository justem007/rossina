<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoDois;

/**
 * Class BlocoDoisTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoDoisTransformer extends TransformerAbstract
{

    public function transform(BlocoDois $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,
            'user_id'    => (int) $model->user_id,
            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at
        ];
    }
}
