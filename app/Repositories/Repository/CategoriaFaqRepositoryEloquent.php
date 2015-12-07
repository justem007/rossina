<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\CategoriaFaqRepository;
use Rossina\CategoriaFaq;
use Rossina\Repositories\Presenters\CategoriaFaqPresenter;

/**
 * Class CategoriaFaqRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class CategoriaFaqRepositoryEloquent extends BaseRepository implements CategoriaFaqRepository
{

    protected $presenter = CategoriaFaqPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return CategoriaFaq::class;
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
