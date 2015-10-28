<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Image;

/**
 * Class ImageTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class ImageTransformer extends TransformerAbstract
{

    public function transform(Image $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'description'=> $model->description,
            'alt'        => $model->alt,
            'title'      => $model->title,
            'extension'  => $model->extension,
            'url'        => $model->url,
            'user_id'    => (int) $model->user_id,
            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at,
        ];
    }

}
