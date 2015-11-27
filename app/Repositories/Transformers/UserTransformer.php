<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\User;

/**
 * Class UserTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'posts',
    ];

    public function transform(User $model)
    {
        return [
            'id'             => (int) $model->id,
            'name'           => $model->name,
            'email'          => $model->email,
//            'password'       => $model->password,
//            'remenber_token' => $model->remenber_token,
            'phone'          => $model->phone,
            'created_at'     => $model->created_at,
            'updated_at'     => $model->updated_at
        ];
    }

//    public function includeImages(User $images)
//    {
//        $images = $images->images;
//
//        return $this->collection($images, new ImageTransformer);
//    }

    public function includePosts(User $posts)
    {
        $posts = $posts->posts;

        return $this->collection($posts, new PostTransformer);
    }
}
