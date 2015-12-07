<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\SobreNo;

/**
 * Class SobreNoTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class SobreNoTransformer extends TransformerAbstract
{

    /**
     * Transform the \SobreNo entity
     * @param \SobreNo $model
     *
     * @return array
     */
    public function transform(SobreNo $model)
    {
        return [
            'id'          => (int) $model->id,
            'titulo'      => $model->titulo,
            'description' => $model->description,
            'created_at' =>  $model->created_at,
            'updated_at' =>  $model->updated_at
        ];
    }
}
