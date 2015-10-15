<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Rossina\Post;
use Rossina\Repositories\Interfaces\PostRepository;

/**
 * Class PostRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */

    public function model()
    {
        return Post::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
