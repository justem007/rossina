<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\TecidoAmostraRepository;
use Rossina\Repositories\Presenters\TecidoAmostraPresenter;
use Rossina\TecidoAmostra;

/**
 * Class TecidoAmostraRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class TecidoAmostraRepositoryEloquent extends BaseRepository implements TecidoAmostraRepository
{
    protected $presenter = TecidoAmostraPresenter::class;

    protected $skipCriteria = true;

    protected $setPresenter = true;

    public function model()
    {
        return TecidoAmostra::class;
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
