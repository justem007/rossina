<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\StatusProducaoRepository;
use Rossina\Repositories\Presenters\StatusProducaoPresenter;
use Rossina\StatusProducao;

/**
 * Class StatusProducaoRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class StatusProducaoRepositoryEloquent extends BaseRepository implements StatusProducaoRepository
{

    protected $presenter = StatusProducaoPresenter::class;

    protected $setPresenter = true;

    protected $skipPresenter = true;

    public function model()
    {
        return StatusProducao::class;
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
