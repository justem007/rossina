<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Menu;

/**
 * Class MenuTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class MenuTransformer extends TransformerAbstract
{

    /**
     * Transform the \Menu entity
     * @param \Menu $model
     *
     * @return array
     */
    public function transform(Menu $model)
    {
        return [
            'id'           => (int) $model->id,
            'title'        => $model->title,
            'url'          => $model->url,
            'description'  => $model->description,
            'alt'          => $model->alt,
            'fafa'         => $model->fafa,

//            'created_at' => $model->created_at,
//            'updated_at' => $model->updated_at
        ];
    }
}
