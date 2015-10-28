<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoDoisDestaque;

class BlocoDoisDestaqueTransformer extends TransformerAbstract
{

    public function transform(BlocoDoisDestaque $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        =>$model->sub_title,
            'user_id'    =>(int) $model->user_id,
            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at
        ];
    }
}