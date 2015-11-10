<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\BlocoTecidoDestaque;
use Rossina\Repositories\Interfaces\BlocoTecidoDestaqueRepository;
use Rossina\Repositories\Presenters\BlocoTecidoDestaquePresenter;

/**
 * Class BlocoTecidoDestaqueRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoTecidoDestaqueRepositoryEloquent extends BaseRepository implements BlocoTecidoDestaqueRepository
{
    protected $presenter = BlocoTecidoDestaquePresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return BlocoTecidoDestaque::class;
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
