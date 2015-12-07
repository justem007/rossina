<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\FaqRepository;
use Rossina\Faq;
use Rossina\Repositories\Presenters\FaqPresenter;

/**
 * Class FaqRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class FaqRepositoryEloquent extends BaseRepository implements FaqRepository
{
    protected $presenter = FaqPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return Faq::class;
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
