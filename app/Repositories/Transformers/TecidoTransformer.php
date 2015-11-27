<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Tecido;

/**
 * Class TecidoTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class TecidoTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'tecimages',
        'tecidoamostras',
        'tags'
    ];

    public function transform(Tecido $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'description'=> $model->description,
            'info'       => $model->info,
            'price_com'  => (double) $model->price_com,
            'price_sem'  => (double) $model->price_sem,
            'user_id'    => (int) $model->user_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeTecimages(Tecido $tecimages)
    {
        $tecimages = $tecimages->tecimages;

        return $this->collection($tecimages, new TecimageTransformer);
    }

    public function includeTecidoamostras(Tecido $tecidoamostras)
    {
        $tecidoamostras = $tecidoamostras->tecidoAmostras;

        return $this->collection($tecidoamostras, new TecidoAmostraTransformer);
    }

    public function includeTags(Tecido $tags)
    {
        $tags = $tags->tags;

        return $this->collection($tags, new TagTransformer);
    }
}
