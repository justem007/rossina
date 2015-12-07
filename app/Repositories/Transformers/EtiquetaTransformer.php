<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Etiqueta;

/**
 * Class EtiquetaTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class EtiquetaTransformer extends TransformerAbstract
{

    public function transform(Etiqueta $model)
    {
        return [
            'id'             => (int) $model->id,
            'name'           => $model->name,
            'description'    => $model->description,
            'url_pdf'        => $model->url_pdf,
            'active'         => (boolean) $model->active,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
