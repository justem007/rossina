<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\CategoriaBlog;

/**
 * Class CategoriaBlogTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class CategoriaBlogTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'posts'
    ];

    public function transform(CategoriaBlog $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'description'=> $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includePosts(CategoriaBlog $posts)
    {
        $posts = $posts->posts;

        return $this->collection($posts, new PostTransformer);
    }
}
