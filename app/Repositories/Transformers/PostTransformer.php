<?php

namespace Rossina\Repositories\Transformers;

use Rossina\Post;
use League\Fractal\TransformerAbstract;

/**
 * Class PostTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class PostTransformer extends TransformerAbstract
{
    /**
     * Transform the \Post entity
     * @param \Post $post
     *
     * @return array
     */
    protected $defaultIncludes = [
//        'images',
        'comments',
        'tags'
    ];

//    protected $availableIncludes = [
//        'tags'
//    ];

    /**
     * @param Post $post
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id'         => (int) $post->id,
            'title'      => $post->title,
            'text'       => $post->text,
            'active'     => (boolean) $post->active,
            'user_id'    => (int) $post->user_id,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ];
    }

//    public function includeImages(Post $images)
//    {
//        $images = $images->images;
//
//        return $this->collection($images, new ImageTransformer);
//    }

    public function includeTags(Post $tags)
    {
        $tags = $tags->tags;

        return $this->collection($tags, new TagTransformer);
    }

    public function includeComments(Post $post)
    {
        $comments = $post->comments;

        return $this->collection($comments, new CommentTransformer);
    }

//    public function includeCategoriaBlogs(Post $categoriaBlogs)
//    {
//        $categoriaBlogs = $categoriaBlogs->categoriaBlogs;
//
//        return $this->collection($categoriaBlogs, new CategoriaBlogTransformer);
//    }
}
