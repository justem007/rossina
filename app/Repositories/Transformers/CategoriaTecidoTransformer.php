<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\CategoriaTecido;

/**
 * Class CategoriaTecidoTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class CategoriaTecidoTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'tecidos'
    ];

    public function transform(CategoriaTecido $model)
    {
        return [
//            'id'                    => (int) $model->id,
            'title'                 => $model->title,
            'description'           => $model->description,
            'created_at'            => $model->created_at,
            'updated_at'            => $model->updated_at
        ];
    }

    public function includeTecidos(CategoriaTecido $tecidos)
    {
        $tecidos = $tecidos->tecidos;

        return $this->collection($tecidos, new TecidoTransformer);
    }
}
