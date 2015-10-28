<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Rossina\BlocoUm;
use Rossina\Repositories\Interfaces\BlocoUmRepository;

/**
 * Class BlocoUmRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoUmRepositoryEloquent extends BaseRepository implements BlocoUmRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
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

    protected $skipPresenter = true;

    public function presenter(){

        return "Prettus\\Repository\\Presenter\\ModelFractalPresenter";

    }

}
