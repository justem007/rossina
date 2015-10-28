<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\TamanhoRepository;
use Rossina\Repositories\Presenters\TamanhoPresenter;
use Rossina\Tamanho;

/**
 * Class TamanhoRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class TamanhoRepositoryEloquent extends BaseRepository implements TamanhoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    protected $presenter = TamanhoPresenter::class;

    public function model()
    {
        return Tamanho::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function presenter(){

        return ModelFractalPresenter::class;

    }
}
