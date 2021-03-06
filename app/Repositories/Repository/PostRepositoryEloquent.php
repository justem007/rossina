<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Post;
use Rossina\Repositories\Criteria\PostCriteria;
use Rossina\Repositories\Interfaces\PostRepository;
use Rossina\Repositories\Presenters\PostPresenter;

/**
 * Class PostRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{

    protected $presenter = PostPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

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
//        $this->pushCriteria(app(PostCriteria::class));
    }

    public function presenter(){

        return ModelFractalPresenter::class;
    }
}
