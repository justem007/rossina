<?php

namespace Rossina\Repositories\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Rossina\Repositories\Interfaces\BlocoDoisRepository;
use Rossina\BlocoDois;

/**
 * Class BlocoDoisRepositoryEloquent
 * @package namespace Rossina\Repositories/Repository;
 */
class BlocoDoisRepositoryEloquent extends BaseRepository implements BlocoDoisRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BlocoDois::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
