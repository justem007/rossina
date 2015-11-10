<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoTecido;

/**
 * Class BlocoTecidoTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoTecidoTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoTecido entity
     * @param \BlocoTecido $model
     *
     * @return array
     */
    public function transform(BlocoTecido $model)
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
