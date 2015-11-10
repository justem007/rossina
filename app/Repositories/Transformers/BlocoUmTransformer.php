<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoUm;

/**
 * Class BlocoUmTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoUmTransformer extends TransformerAbstract
{

    public function transform(BlocoUm $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,
            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at,
        ];
    }
}
