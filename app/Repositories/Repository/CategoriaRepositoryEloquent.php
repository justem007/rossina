<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\CategoriaRepository;
use Rossina\Categoria;
use Rossina\Repositories\Presenters\CategoriaPresenter;

/**
 * Class CategoriaRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class CategoriaRepositoryEloquent extends BaseRepository implements CategoriaRepository
{
    protected $presenter = CategoriaPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return Categoria::class;
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
