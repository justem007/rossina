<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\BlocoCamisetaRepository;
use Rossina\BlocoCamiseta;
use Rossina\Repositories\Presenters\BlocoCamisetaPresenter;

/**
 * Class BlocoCamisetaRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoCamisetaRepositoryEloquent extends BaseRepository implements BlocoCamisetaRepository
{

    protected $presenter = BlocoCamisetaPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return BlocoCamiseta::class;
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
