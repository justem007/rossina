<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\BlocoDoisDestaque;
use Rossina\Repositories\Interfaces\BlocoDoisDestaqueRepository;
use Rossina\Repositories\Presenters\BlocoDoisDestaquePresenter;

/**
 * Class BlocoDoisDestaqueRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoDoisDestaqueRepositoryEloquent extends BaseRepository implements BlocoDoisDestaqueRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    protected $skipPresenter = true;

    public function model()
    {
        return BlocoDoisDestaque::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){

        return ModelFractalPresenter::class;

    }

}
