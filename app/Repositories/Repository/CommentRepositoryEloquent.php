<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Prettus\Repository\Traits\CacheableRepository;
use Rossina\Repositories\Criteria\CommentCriteria;
use Rossina\Repositories\Interfaces\CommentRepository;
use Rossina\Comment;
use Rossina\Repositories\Presenters\CommentPresenter;

/**
 * Class CommentRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class CommentRepositoryEloquent extends BaseRepository implements CommentRepository
{
    /**
     *
     * Specify Model class name
     *
     * @return string
     */

    protected $fieldSearchable = [
        'email', 'text'
    ];

    public function model()
    {
        return Comment::class;
    }

    protected $presenter = CommentPresenter::class;

    /**
     * Boot up the repository, pushing criteria
     */

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
//        $this->pushCriteria(app(CommentCriteria::class));
    }

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function presenter(){

        return ModelFractalPresenter::class;

    }
}
