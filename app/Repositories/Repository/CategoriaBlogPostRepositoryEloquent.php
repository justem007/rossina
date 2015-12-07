<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Rossina\Repositories\Interfaces\CategoriaBlogPostRepository;
use Rossina\CategoriaBlogPost;

/**
 * Class CategoriaBlogPostRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class CategoriaBlogPostRepositoryEloquent extends BaseRepository implements CategoriaBlogPostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoriaBlogPost::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
