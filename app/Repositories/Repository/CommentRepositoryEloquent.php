<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Traits\CacheableRepository;
use Rossina\Repositories\Criteria\CommentCriteria;
use Rossina\Repositories\Interfaces\CommentRepository;
use Rossina\Comment;

/**
 * Class CommentRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class CommentRepositoryEloquent extends BaseRepository implements CommentRepository , CacheableInterface
{
    use CacheableRepository;

    /**
     *
     * Specify Model class name
     *
     * @return string
     */

    protected $fieldSearchable = [
        'email', 'text'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function model()
    {
        return Comment::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(app(CommentCriteria::class));
    }
}
