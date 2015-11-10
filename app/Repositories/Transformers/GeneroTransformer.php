<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Genero;

class GeneroTransformer extends TransformerAbstract
{

    public function transform(Genero $model)
    {
        return [
            'id'          => (int) $model->id,
            'name'        => $model->name,
            'description' => $model->description,
//            'created_at'  => (string) $model->created_at,
//            'updated_at'  => (string) $model->updated_at
        ];
    }
}
