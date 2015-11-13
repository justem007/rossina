<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\CategoriaBlogRepository;
use Rossina\CategoriaBlog;
use Rossina\Repositories\Presenters\CategoriaBlogPresenter;

/**
 * Class CategoriaBlogRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class CategoriaBlogRepositoryEloquent extends BaseRepository implements CategoriaBlogRepository
{
    protected $presenter = CategoriaBlogPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return CategoriaBlog::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return ModelFractalPresenter::class;
    }
}
