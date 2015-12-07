<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Camisetas;
use Rossina\Repositories\Criteria\CamisetaCriteria;
use Rossina\Repositories\Interfaces\CamisetasRepository;
use Rossina\Repositories\Presenters\CamisetasPresenter;

/**
 * Class CamisetasRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
    class CamisetasRepositoryEloquent extends BaseRepository implements CamisetasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $presenter = CamisetasPresenter::class;

        protected $fieldSearchable = ['price'];

    public function model()
    {
        return Camisetas::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(app(CamisetaCriteria::class));
    }

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function presenter(){

        return ModelFractalPresenter::class;

    }
}
