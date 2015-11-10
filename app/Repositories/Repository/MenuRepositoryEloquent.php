<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Rossina\Repositories\Interfaces\MenuRepository;
use Rossina\Menu;
use Rossina\Repositories\Presenters\MenuPresenter;

/**
 * Class MenuRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{

    protected $presenter = MenuPresenter::class;

    protected $setPresenter = true;

    protected $skipPresenter = true;

    public function model()
    {
        return Menu::class;
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
