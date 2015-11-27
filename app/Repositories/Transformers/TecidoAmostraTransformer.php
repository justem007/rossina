<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\TecidoAmostra;

/**
 * Class TecidoAmostraTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class TecidoAmostraTransformer extends TransformerAbstract
{

    public function transform(TecidoAmostra $model)
    {
        return [
            'id'           => (int) $model->id,
            'name'         => $model->name,
            'description'  => $model->description,
            'medidas'      => $model->medidas,
            'price'        => (double) $model->price,
            'created_at'   => $model->created_at,
            'updated_at'   => $model->updated_at
        ];
    }

}
