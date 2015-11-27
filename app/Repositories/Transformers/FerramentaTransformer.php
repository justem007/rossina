<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Ferramenta;

/**
 * Class FerramentaTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class FerramentaTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'images'
    ];

    public function transform(Ferramenta $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'description'=> $model->description,
            'alt'        => $model->alt,
            'image_id'   => (int) $model->image_id,
            'user_id'    => (int) $model->user_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeImages(Ferramenta $images)
    {
        $images = $images->images;

        return $this->collection($images, new ImageTransformer);
    }
}
