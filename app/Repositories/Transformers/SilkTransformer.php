<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Silk;

/**
 * Class SilkTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class SilkTransformer extends TransformerAbstract
{

    public function transform(Silk $model)
    {
        return [
            'id'           => (int) $model->id,
            'name'         => $model->name,
            'description'  => $model->description,
            'medida'       => $model->medida,
            'price_un_com' => (double) $model->price_un_com,
            'price_un_sem' => (double) $model->price_un_sem,
            'created_at'   => $model->created_at,
            'updated_at'   => $model->updated_at
        ];
    }
}
