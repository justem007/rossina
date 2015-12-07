<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\TecidoRepository;
use Rossina\Repositories\Presenters\TecidoPresenter;
use Rossina\Tecido;

/**
 * Class TecidoRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class TecidoRepositoryEloquent extends BaseRepository implements TecidoRepository
{

    protected $presenter = TecidoPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tecido::class;
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
