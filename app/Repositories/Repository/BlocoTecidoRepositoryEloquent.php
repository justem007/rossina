<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\BlocoTecidoRepository;
use Rossina\BlocoTecido;
use Rossina\Repositories\Presenters\BlocoTecidoPresenter;

/**
 * Class BlocoTecidoRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoTecidoRepositoryEloquent extends BaseRepository implements BlocoTecidoRepository
{

    protected $presenter = BlocoTecidoPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return BlocoTecido::class;
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
