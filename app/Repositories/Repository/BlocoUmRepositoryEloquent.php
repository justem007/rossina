<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\BlocoUm;
use Rossina\Repositories\Interfaces\BlocoUmRepository;
use Rossina\Repositories\Presenters\BlocoUmPresenter;

/**
 * Class BlocoUmRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoUmRepositoryEloquent extends BaseRepository implements BlocoUmRepository
{

    protected $skipPresenter = true;

    protected $setpresenter = true;

    protected $presenter = BlocoUmPresenter::class;

    public function model()
    {
        return BlocoUm::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){

        return ModelFractalPresenter::class;

    }

}
