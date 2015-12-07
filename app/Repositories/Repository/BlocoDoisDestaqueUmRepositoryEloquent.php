<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\BlocoDoisDestaqueUmRepository;
use Rossina\BlocoDoisDestaqueUm;
use Rossina\Repositories\Presenters\BlocoDoisDestaqueUmPresenter;

/**
 * Class BlocoDoisDestaqueUmRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoDoisDestaqueUmRepositoryEloquent extends BaseRepository implements BlocoDoisDestaqueUmRepository
{

    protected $presenter = BlocoDoisDestaqueUmPresenter::class;

    protected $setPresenter = true;

    protected $skipPresenter = true;

    public function model()
    {
        return BlocoDoisDestaqueUm::class;
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
