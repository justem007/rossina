<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\SilkRepository;
use Rossina\Repositories\Presenters\SilkPresenter;

use Rossina\Silk;

/**
 * Class SilkRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class SilkRepositoryEloquent extends BaseRepository implements SilkRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $presenter = SilkPresenter::class;

    protected $setPresenter = true;

    protected $skipPresenter = true;

    public function model()
    {
        return Silk::class;
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
