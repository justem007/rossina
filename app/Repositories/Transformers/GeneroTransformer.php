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
            'created_at'  => $model->created_at,
            'updated_at'  => $model->updated_at
        ];
    }
}
