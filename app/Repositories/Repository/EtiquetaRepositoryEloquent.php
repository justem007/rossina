<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\EtiquetaRepository;
use Rossina\Etiqueta;
use Rossina\Repositories\Presenters\EtiquetaPresenter;

/**
 * Class EtiquetaRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class EtiquetaRepositoryEloquent extends BaseRepository implements EtiquetaRepository
{

    protected $presenter = EtiquetaPresenter::class;

    protected $skipCriteria = true;

    protected $setPresenter = true;

    public function model()
    {
        return Etiqueta::class;
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
