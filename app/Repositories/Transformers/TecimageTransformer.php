<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Tecimage;

/**
 * Class TecimageTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class TecimageTransformer extends TransformerAbstract
{

    /**
     * Transform the \Tecimage entity
     * @param \Tecimage $model
     *
     * @return array
     */
    public function transform(Tecimage $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'description'=> $model->description,
            'url'        => $model->url,
            'alt'        => $model->alt,
            'title'      => $model->title,
            'extension'  => $model->extension,
            'user_id'    => (int) $model->user_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
