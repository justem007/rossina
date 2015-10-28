<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\TagRepository;
use Rossina\Repositories\Presenters\TagPresenter;
use Rossina\Tag;

/**
 * Class TagRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class TagRepositoryEloquent extends BaseRepository implements TagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tag::class;
    }

    protected $presenter = TagPresenter::class;

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function presenter(){

        return ModelFractalPresenter::class;

    }
}
