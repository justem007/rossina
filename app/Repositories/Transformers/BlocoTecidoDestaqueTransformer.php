<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\BlocoTecidoDestaque;

/**
 * Class BlocoTecidoDestaqueTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class BlocoTecidoDestaqueTransformer extends TransformerAbstract
{

    /**
     * Transform the \BlocoTecidoDestaque entity
     * @param \BlocoTecidoDestaque $model
     *
     * @return array
     */
    public function transform(BlocoTecidoDestaque $model)
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
