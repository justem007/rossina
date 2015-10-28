<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Ferramenta;
use Rossina\Repositories;
use Rossina\Repositories\Interfaces\FerramentaRepository;
use Rossina\Repositories\Presenters\FerramentaPresenter;

class FerramentaRepositoryEloquent extends BaseRepository implements FerramentaRepository
{

    protected $presenter = FerramentaPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return Ferramenta::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return ModelFractalPresenter::class;
    }
}
