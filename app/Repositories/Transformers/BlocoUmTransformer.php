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

    /**
     * Transform the \BlocoUm entity
     * @param \BlocoUm $model
     *
     * @return array
     */
    public function transform(BlocoUm $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'sub_title'  => $model->sub_title,
            'alt'        => $model->alt,
            'created_at' => date_format($model->created_at, "d/m/Y H:m:s"),
            'updated_at' => date_format($model->updated_at, "d/m/Y H:m:s")
        ];
    }
}
