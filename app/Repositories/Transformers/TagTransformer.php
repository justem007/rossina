<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Tag;

/**
 * Class TagTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class TagTransformer extends TransformerAbstract
{

//    protected $defaultIncludes = [
//        'posts'
//    ];

    public function transform(Tag $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
//            'created_at' => (string) $model->created_at,
//            'updated_at' => (string) $model->updated_at
        ];
    }

//    public function includePosts(Tag $posts)
//    {
//        $posts = $posts->posts;
//
//        return $this->collection($posts, new PostTransformer);
//    }
}
