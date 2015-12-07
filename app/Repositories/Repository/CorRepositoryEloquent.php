<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Cor;
use Rossina\Repositories\Interfaces\CorRepository;
use Rossina\Repositories\Presenters\CorPresenter;

/**
 * Class CorRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class CorRepositoryEloquent extends BaseRepository implements CorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $presenter = CorPresenter::class;

    public function model()
    {
        return Cor::class;
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
