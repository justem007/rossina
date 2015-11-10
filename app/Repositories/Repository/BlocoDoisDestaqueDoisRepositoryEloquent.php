<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\BlocoDoisDestaqueDoisRepository;
use Rossina\BlocoDoisDestaqueDois;
use Rossina\Repositories\Presenters\BlocoDoisDestaqueDoisPresenter;

/**
 * Class BlocoDoisDestaqueDoisRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoDoisDestaqueDoisRepositoryEloquent extends BaseRepository implements BlocoDoisDestaqueDoisRepository
{

    protected $presenter = BlocoDoisDestaqueDoisPresenter::class;

    protected $skipPresenter = true;

    protected $setPresenter = true;

    public function model()
    {
        return BlocoDoisDestaqueDois::class;
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
        return ModelfractalPresenter::class;
    }
}
