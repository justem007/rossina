<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Cor;

class CorTransformer extends TransformerAbstract
{

//    protected $defaultIncludes = [
//        'generos',
//        'cors'
//    ];
//
    public function transform(Cor $model)
    {
        return [
//            'id'         => (int) $model->id,
            'name'       => $model->name,
            'rgb'        => $model->rgb,
//            'created_at' => (string) $model->created_at,
//            'updated_at' => (string) $model->updated_at
        ];
    }

//    public function includeCors(Cor $cors)
//    {
//        $cors = $cors->cors;
//
//        return $this->collection($cors, new GeneroTransformer);
//    }
}
