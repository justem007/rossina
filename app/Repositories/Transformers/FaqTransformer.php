<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Faq;

/**
 * Class FaqTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class FaqTransformer extends TransformerAbstract
{

//    protected $defaultIncludes = [
//        'categorias'
//    ];

    public function transform(Faq $model)
    {
        return [
            'id'          => (int) $model->id,
            'title'       => $model->title,
            'description' => $model->description,
            'created_at'  => $model->created_at,
            'updated_at'  => $model->updated_at
        ];
    }

//    public function includeCategorias(Faq $categorias)
//    {
//        $categorias = $categorias->categorias;
//
//        return $this->collection($categorias, new CategoriaFaqTransformer);
//    }
}
