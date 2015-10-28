<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\BlocoUmDestaqueRepository;
use Rossina\BlocoUmDestaque;
use Rossina\Repositories\Presenters\BlocoUmDestaquePresenter;

/**
 * Class BlocoUmDestaqueRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoUmDestaqueRepositoryEloquent extends BaseRepository implements BlocoUmDestaqueRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    protected $fieldSearchable = [
        'title',
        'sub_title'
    ];

    public function model()
    {
        return BlocoUmDestaque::class;
    }

    protected $presenter = BlocoUmDestaquePresenter::class;

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
