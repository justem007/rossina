<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\HorarioRepository;
use Rossina\Horario;
use Rossina\Repositories\Presenters\HorarioPresenter;

/**
 * Class HorarioRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class HorarioRepositoryEloquent extends BaseRepository implements HorarioRepository
{

    protected $presenter = HorarioPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return Horario::class;
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
