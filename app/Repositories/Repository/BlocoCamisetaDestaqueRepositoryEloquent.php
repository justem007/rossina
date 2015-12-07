<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\BlocoCamisetaDestaqueRepository;
use Rossina\BlocoCamisetaDestaque;
use Rossina\Repositories\Presenters\BlocoCamisetaDestaquePresenter;

/**
 * Class BlocoCamisetaDestaqueRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoCamisetaDestaqueRepositoryEloquent extends BaseRepository implements BlocoCamisetaDestaqueRepository
{
    protected  $presenter = BlocoCamisetaDestaquePresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return BlocoCamisetaDestaque::class;
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
