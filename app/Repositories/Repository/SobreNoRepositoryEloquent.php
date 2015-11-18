<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\SobreNoRepository;
use Rossina\Repositories\Presenters\SobreNoPresenter;
use Rossina\SobreNo;

/**
 * Class SobreNoRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class SobreNoRepositoryEloquent extends BaseRepository implements SobreNoRepository
{
    protected $presenter = SobreNoPresenter::class;

    protected $setPresenter = true;

    protected $skipPresenter = true;

    public function model()
    {
        return SobreNo::class;
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
