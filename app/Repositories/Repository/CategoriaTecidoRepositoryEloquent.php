<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\CategoriaTecidoRepository;
use Rossina\CategoriaTecido;
use Rossina\Repositories\Presenters\CategoriaTecidoPresenter;

/**
 * Class CategoriaTecidoRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class CategoriaTecidoRepositoryEloquent extends BaseRepository implements CategoriaTecidoRepository
{
    protected $presenter = CategoriaTecidoPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return CategoriaTecido::class;
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
