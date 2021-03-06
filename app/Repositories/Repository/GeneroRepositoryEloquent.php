<?php

namespace Rossina\RepositoriesRepository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Genero;
use Rossina\Repositories\Interfaces\GeneroRepository;
use Rossina\Repositories\Presenters\GeneroPresenter;

class GeneroRepositoryEloquent extends BaseRepository implements GeneroRepository
{
    protected $presenter = GeneroPresenter::class;

    protected $setPresenter = true;

    protected $skipPresenter = true;

    public function model()
    {
        return Genero::class;
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
